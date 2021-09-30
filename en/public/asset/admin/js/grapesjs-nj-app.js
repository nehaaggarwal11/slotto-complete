(function($) {
    $.fn.loadingButton = function(action) {
        var loadingText = this.data('loading-text') || '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
        if (action === 'loading' && loadingText) {
            this.data('original-text', this.html()).html(loadingText).prop('disabled', true);
        }
        if (action === 'reset' && this.data('original-text')) {
            this.html(this.data('original-text')).prop('disabled', false);
        }
    };
}(jQuery));
JSON.stringifyWithCircularRefs = (function() {
    const refs = new Map();
    const parents = [];
    const path = ["this"];

    function clear() {
        refs.clear();
        parents.length = 0;
        path.length = 1;
    }

    function updateParents(key, value) {
        var idx = parents.length - 1;
        var prev = parents[idx];
        if (prev[key] === value || idx === 0) {
            path.push(key);
            parents.push(value);
        } else {
            while (idx-- >= 0) {
                prev = parents[idx];
                if (prev !== undefined && prev[key] === value) {
                    idx += 2;
                    parents.length = idx;
                    path.length = idx;
                    --idx;
                    parents[idx] = value;
                    path[idx] = key;
                    break;
                }
            }
        }
    }

    function checkCircular(key, value) {
        if (value != null) {
            if (typeof value === "object") {
                if (key) { updateParents(key, value); }

                let other = refs.get(value);
                if (other) {
                    return '[Circular Reference]' + other;
                } else {
                    refs.set(value, path.join('.'));
                }
            }
        }
        return value;
    }

    return function stringifyWithCircularRefs(obj, space) {
        try {
            parents.push(obj);
            return JSON.stringify(obj, checkCircular, space);
        } finally {
            clear();
        }
    }
})();

function setUpEditor(){
    const editor  = grapesjs.init({
        container : '#gjs',
        allowScripts: 1,
        avoidInlineStyle: 1,
        // height: '100%',
        fromElement: 1,
        showOffsets: 1,
        assetManager: {
            embedAsBase64: 1,
            assets: [] // images
        },
        selectorManager: { componentFirst: true },
        styleManager: { clearProperties: 1 },
        plugins: [
            'grapesjs-touch',
            'grapesjs-parser-postcss',
            'grapesjs-tui-image-editor',
            'grapesjs-style-bg',
            'gjs-preset-webpage',
            // 'grapesjs-blocks-basic',
            // 'grapesjs-lory-slider',
            // 'grapesjs-tabs',
            // 'grapesjs-custom-code',
            // 'grapesjs-tooltip',
            // 'grapesjs-typed',
            // 'grapesjs-component-code-editor',
            // 'grapesjs-nj-casinos',
        ],
        pluginsOpts: {
        //     'grapesjs-lory-slider': {
        //         sliderBlock: {
        //             category: 'Extra'
        //         }
        //     },
        //     'grapesjs-tabs': {
        //         tabsBlock: {
        //             category: 'Extra'
        //         }
        //     },
        //     'grapesjs-typed': {
        //         block: {
        //             category: 'Extra',
        //             content: {
        //                 type: 'typed',
        //                 'type-speed': 40,
        //                 strings: [
        //                     'Text row one',
        //                     'Text row two',
        //                     'Text row three',
        //                 ],
        //             }
        //         }
        //     },
            'gjs-preset-webpage': {
                formsOpts: false,
                showStylesOnChange: false,
                // modalImportTitle: 'Import Template',
                // modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
                // modalImportContent: function(editor) {
                //     return editor.getHtml() + '<style>'+editor.getCss()+'</style>'
                // },
                // filestackOpts: null, //{ key: 'AYmqZc2e8RLGLE7TGkX3Hz' },
                // aviaryOpts: false,
                // blocksBasicOpts: { flexGrid: 1 },

                // customStyleManager: [
                //     {
                //         name: 'General',
                //         buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom'],
                //         properties:[{
                //             name: 'Alignment',
                //             property: 'float',
                //             type: 'radio',
                //             defaults: 'none',
                //             list: [
                //                 { value: 'none', className: 'fa fa-times'},
                //                 { value: 'left', className: 'fa fa-align-left'},
                //                 { value: 'right', className: 'fa fa-align-right'}
                //             ],
                //         },
                //             { property: 'position', type: 'select'}
                //         ],
                //     },
                //     {
                //         name: 'Dimension',
                //         open: false,
                //         buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
                //         properties: [{
                //             id: 'flex-width',
                //             type: 'integer',
                //             name: 'Width',
                //             units: ['px', '%'],
                //             property: 'flex-basis',
                //             toRequire: 1,
                //         },{
                //             property: 'margin',
                //             properties:[
                //                 { name: 'Top', property: 'margin-top'},
                //                 { name: 'Right', property: 'margin-right'},
                //                 { name: 'Bottom', property: 'margin-bottom'},
                //                 { name: 'Left', property: 'margin-left'}
                //             ],
                //         },{
                //             property  : 'padding',
                //             properties:[
                //                 { name: 'Top', property: 'padding-top'},
                //                 { name: 'Right', property: 'padding-right'},
                //                 { name: 'Bottom', property: 'padding-bottom'},
                //                 { name: 'Left', property: 'padding-left'}
                //             ],
                //         }],
                //     },
                //     {
                //         name: 'Typography',
                //         open: false,
                //         buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-decoration', 'text-shadow'],
                //         properties:[
                //             { name: 'Font', property: 'font-family'},
                //             { name: 'Weight', property: 'font-weight'},
                //             { name:  'Font color', property: 'color'},
                //             {
                //                 property: 'text-align',
                //                 type: 'radio',
                //                 defaults: 'left',
                //                 list: [
                //                     { value : 'left',  name : 'Left',    className: 'fa fa-align-left'},
                //                     { value : 'center',  name : 'Center',  className: 'fa fa-align-center' },
                //                     { value : 'right',   name : 'Right',   className: 'fa fa-align-right'},
                //                     { value : 'justify', name : 'Justify',   className: 'fa fa-align-justify'}
                //                 ],
                //             },{
                //                 property: 'text-decoration',
                //                 type: 'radio',
                //                 defaults: 'none',
                //                 list: [
                //                     { value: 'none', name: 'None', className: 'fa fa-times'},
                //                     { value: 'underline', name: 'underline', className: 'fa fa-underline' },
                //                     { value: 'line-through', name: 'Line-through', className: 'fa fa-strikethrough'}
                //                 ],
                //             },{
                //                 property: 'text-shadow',
                //                 properties: [
                //                     { name: 'X position', property: 'text-shadow-h'},
                //                     { name: 'Y position', property: 'text-shadow-v'},
                //                     { name: 'Blur', property: 'text-shadow-blur'},
                //                     { name: 'Color', property: 'text-shadow-color'}
                //                 ],
                //             }],
                //     },
                //     {
                //         name: 'Decorations',
                //         open: false,
                //         buildProps: ['opacity', 'border-radius', 'border', 'box-shadow', 'background-bg'],
                //         properties: [{
                //             type: 'slider',
                //             property: 'opacity',
                //             defaults: 1,
                //             step: 0.01,
                //             max: 1,
                //             min:0,
                //         },{
                //             property: 'border-radius',
                //             properties  : [
                //                 { name: 'Top', property: 'border-top-left-radius'},
                //                 { name: 'Right', property: 'border-top-right-radius'},
                //                 { name: 'Bottom', property: 'border-bottom-left-radius'},
                //                 { name: 'Left', property: 'border-bottom-right-radius'}
                //             ],
                //         },{
                //             property: 'box-shadow',
                //             properties: [
                //                 { name: 'X position', property: 'box-shadow-h'},
                //                 { name: 'Y position', property: 'box-shadow-v'},
                //                 { name: 'Blur', property: 'box-shadow-blur'},
                //                 { name: 'Spread', property: 'box-shadow-spread'},
                //                 { name: 'Color', property: 'box-shadow-color'},
                //                 { name: 'Shadow type', property: 'box-shadow-type'}
                //             ],
                //         },{
                //             id: 'background-bg',
                //             property: 'background',
                //             type: 'bg',
                //         },],
                //     },
                //     {
                //         name: 'Extra',
                //         open: false,
                //         buildProps: ['transition', 'perspective', 'transform'],
                //         properties: [{
                //             property: 'transition',
                //             properties:[
                //                 { name: 'Property', property: 'transition-property'},
                //                 { name: 'Duration', property: 'transition-duration'},
                //                 { name: 'Easing', property: 'transition-timing-function'}
                //             ],
                //         },{
                //             property: 'transform',
                //             properties:[
                //                 { name: 'Rotate X', property: 'transform-rotate-x'},
                //                 { name: 'Rotate Y', property: 'transform-rotate-y'},
                //                 { name: 'Rotate Z', property: 'transform-rotate-z'},
                //                 { name: 'Scale X', property: 'transform-scale-x'},
                //                 { name: 'Scale Y', property: 'transform-scale-y'},
                //                 { name: 'Scale Z', property: 'transform-scale-z'}
                //             ],
                //         }]
                //     },
                //     {
                //         name: 'Flex',
                //         open: false,
                //         properties: [{
                //             name: 'Flex Container',
                //             property: 'display',
                //             type: 'select',
                //             defaults: 'block',
                //             list: [
                //                 { value: 'block', name: 'Disable'},
                //                 { value: 'flex', name: 'Enable'}
                //             ],
                //         },{
                //             name: 'Flex Parent',
                //             property: 'label-parent-flex',
                //             type: 'integer',
                //         },{
                //             name      : 'Direction',
                //             property  : 'flex-direction',
                //             type    : 'radio',
                //             defaults  : 'row',
                //             list    : [{
                //                 value   : 'row',
                //                 name    : 'Row',
                //                 className : 'icons-flex icon-dir-row',
                //                 title   : 'Row',
                //             },{
                //                 value   : 'row-reverse',
                //                 name    : 'Row reverse',
                //                 className : 'icons-flex icon-dir-row-rev',
                //                 title   : 'Row reverse',
                //             },{
                //                 value   : 'column',
                //                 name    : 'Column',
                //                 title   : 'Column',
                //                 className : 'icons-flex icon-dir-col',
                //             },{
                //                 value   : 'column-reverse',
                //                 name    : 'Column reverse',
                //                 title   : 'Column reverse',
                //                 className : 'icons-flex icon-dir-col-rev',
                //             }],
                //         },{
                //             name      : 'Justify',
                //             property  : 'justify-content',
                //             type    : 'radio',
                //             defaults  : 'flex-start',
                //             list    : [{
                //                 value   : 'flex-start',
                //                 className : 'icons-flex icon-just-start',
                //                 title   : 'Start',
                //             },{
                //                 value   : 'flex-end',
                //                 title    : 'End',
                //                 className : 'icons-flex icon-just-end',
                //             },{
                //                 value   : 'space-between',
                //                 title    : 'Space between',
                //                 className : 'icons-flex icon-just-sp-bet',
                //             },{
                //                 value   : 'space-around',
                //                 title    : 'Space around',
                //                 className : 'icons-flex icon-just-sp-ar',
                //             },{
                //                 value   : 'center',
                //                 title    : 'Center',
                //                 className : 'icons-flex icon-just-sp-cent',
                //             }],
                //         },{
                //             name      : 'Align',
                //             property  : 'align-items',
                //             type    : 'radio',
                //             defaults  : 'center',
                //             list    : [{
                //                 value   : 'flex-start',
                //                 title    : 'Start',
                //                 className : 'icons-flex icon-al-start',
                //             },{
                //                 value   : 'flex-end',
                //                 title    : 'End',
                //                 className : 'icons-flex icon-al-end',
                //             },{
                //                 value   : 'stretch',
                //                 title    : 'Stretch',
                //                 className : 'icons-flex icon-al-str',
                //             },{
                //                 value   : 'center',
                //                 title    : 'Center',
                //                 className : 'icons-flex icon-al-center',
                //             }],
                //         },{
                //             name: 'Flex Children',
                //             property: 'label-parent-flex',
                //             type: 'integer',
                //         },{
                //             name:     'Order',
                //             property:   'order',
                //             type:     'integer',
                //             defaults :  0,
                //             min: 0
                //         },{
                //             name    : 'Flex',
                //             property  : 'flex',
                //             type    : 'composite',
                //             properties  : [{
                //                 name:     'Grow',
                //                 property:   'flex-grow',
                //                 type:     'integer',
                //                 defaults :  0,
                //                 min: 0
                //             },{
                //                 name:     'Shrink',
                //                 property:   'flex-shrink',
                //                 type:     'integer',
                //                 defaults :  0,
                //                 min: 0
                //             },{
                //                 name:     'Basis',
                //                 property:   'flex-basis',
                //                 type:     'integer',
                //                 units:    ['px','%',''],
                //                 unit: '',
                //                 defaults :  'auto',
                //             }],
                //         },{
                //             name      : 'Align',
                //             property  : 'align-self',
                //             type      : 'radio',
                //             defaults  : 'auto',
                //             list    : [{
                //                 value   : 'auto',
                //                 name    : 'Auto',
                //             },{
                //                 value   : 'flex-start',
                //                 title    : 'Start',
                //                 className : 'icons-flex icon-al-start',
                //             },{
                //                 value   : 'flex-end',
                //                 title    : 'End',
                //                 className : 'icons-flex icon-al-end',
                //             },{
                //                 value   : 'stretch',
                //                 title    : 'Stretch',
                //                 className : 'icons-flex icon-al-str',
                //             },{
                //                 value   : 'center',
                //                 title    : 'Center',
                //                 className : 'icons-flex icon-al-center',
                //             }],
                //         }]
                //     }
                // ],
            },
        },
    });

    const pn = editor.Panels;
    const cmdm = editor.Commands;
    const b = editor.Blocks;
    const c = editor.Components;
    const dc = editor.DomComponents;
    const cm = editor.CodeManager;
    const bm = editor.BlockManager;
    const pfx = editor.getConfig().stylePrefix;

    const nj_editor_modal = editor.Modal;
    const htmlCodeViewer = cm.getViewer('CodeMirror').clone();
    htmlCodeViewer.set({
        codeName: 'htmlmixed',
        readOnly: 0,
        theme: 'hopscotch',
        autoBeautify: true,
        autoCloseTags: true,
        autoCloseBrackets: true,
        lineWrapping: true,
        styleActiveLine: true,
        smartIndent: true,
        indentWithTabs: true
    });

    const cssCodeViewer = cm.getViewer('CodeMirror').clone();
    cssCodeViewer.set({
        codeName: 'css',
        readOnly: 0,
        theme: 'hopscotch',
        autoBeautify: true,
        autoCloseTags: true,
        autoCloseBrackets: true,
        lineWrapping: true,
        styleActiveLine: true,
        smartIndent: true,
        indentWithTabs: true
    });

    const nj_editor_save_button = document.createElement('button');
    nj_editor_save_button.innerHTML = 'Edit';
    nj_editor_save_button.className = pfx + 'btn-prim ' + pfx + 'btn-import mt-2';
    nj_editor_save_button.onclick = function() {
        const html_code = htmlCodeViewer.editor.getValue();
        const css_code = cssCodeViewer.editor.getValue();
        let code = html_code.trim() + '<style>' + css_code.trim() + '</style>';
        dc.getWrapper().set('content', '');
        editor.setComponents(code);
        nj_editor_modal.close();
    };
    const main_container_html = `<div id="gjs-nj-code-editor-dl">
        <div class="gjs-cm-editor-c">
            <div class="gjs-cm-editor" id="gjs-cm-htmlmixed">
                <div id="gjs-cm-title">HTML</div>
                <div id="gjs-nj-html-editor-dl"></div>
            </div>
        </div>
        <div class="gjs-cm-editor-c">
            <div class="gjs-cm-editor" id="gjs-cm-css">
                <div id="gjs-cm-title">CSS</div>
                <div id="gjs-nj-css-editor-dl"></div>
            </div>
        </div>
    </div>`;

    cmdm.add('html-edit', {
        run: function(editor, sender) {
            console.log("3o23r9");
            sender && sender.set('active', 0);
            nj_editor_modal.setTitle('Edit code');
            let html_viewer = htmlCodeViewer.editor;
            let css_viewer = cssCodeViewer.editor;

            if (!html_viewer || !css_viewer) {
                nj_editor_modal.setContent('');
                nj_editor_modal.setContent(main_container_html);
            }

            if (!html_viewer) {
                const html_textarea = document.createElement('textarea');
                const html_container = document.getElementById('gjs-nj-html-editor-dl');
                html_container.appendChild(html_textarea);
                htmlCodeViewer.init(html_textarea);
                html_viewer = htmlCodeViewer.editor;
            }

            if (!css_viewer) {
                const css_textarea = document.createElement('textarea');
                const css_container = document.getElementById('gjs-nj-css-editor-dl');
                css_container.appendChild(css_textarea);
                cssCodeViewer.init(css_textarea);
                css_viewer = cssCodeViewer.editor;
            }

            const InnerHtml = editor.getHtml();
            const Css = editor.getCss();

            htmlCodeViewer.setContent(InnerHtml);
            cssCodeViewer.setContent(Css);

            // set button
            const main_container = document.getElementById('gjs-nj-code-editor-dl');
            main_container.append(nj_editor_save_button);

            nj_editor_modal.open();
            html_viewer.refresh();
            css_viewer.refresh();
        }
    });

    pn.addButton('options', [{
        id: 'edit',
        className: 'fa fa-code',
        command: 'html-edit',
        attributes: {
            title: 'Edit code'
        }
    }]);
    // remove option buttons
    pn.removeButton('options', 'export-template');
    pn.removeButton('options', 'gjs-open-import-webpage');


    ///// Add heading blocks (START) /////
    for (let i = 1; i <= 6; i++) {
        bm.add(`ng-h${i}-block`, {
            label: `Heading ${i}`,
            category: 'Basic',
            content: `<h${i}>Insert your text here</h${i}>`,
            attributes: {
                class: 'gjs-f-text gjs-fonts',
                title: 'Insert heading ${i} block'
            }
        });
    }
    /*
    {
      "activate": 0,
      "select": 0,
      "resetId": 0,
      "label": "Map",
      "disable": 0,
      "media": "",
      "content": {
        "type": "map",
        "style": {
          "height": "350px"
        }
      },
      "category": {
        "id": "Basic",
        "label": "Basic",
        "open": true,
        "attributes": {}
      },
      "attributes": {
        "class": "fa fa-map-o"
      },
      "id": "map"
    }
    */
    /*
        editor.BlockManager.add('nj-video', {
            label: 'NJ Video',
            category: 'Custom',
            attributes: { class: 'fa fa-youtube-play' },
            content: {
                type: 'video',
                src: 'img/video2.webm',
                style: {
                    height: '350px',
                    width: '615px'
                }
            }
        });

        editor.BlockManager.add('grapesjs-nj-casinos', {
            name: 'Casinos',
            category: 'Custom',
            label: '<b>Twitter Feed</b>',
            content: {
                attributes: {
                    'wac-block': 'twitter',
                },
                traits: [
                    {
                        label: 'Twitter',
                        name: 'twitter-title',
                        type: 'text',
                        value: '{{ platform.title }}'
                    }
                ],
                activeOnRender: 1 ,
                content: `<div class="block">Twitter Feed</div>`,
            },
            attributes: {
                class: 'fab fa-twitter fa-1x'
            }
        });*/
    /*
    editor.BlockManager.add('grapesjs-nj-casinos', {
        label: 'Casinos',
        content: '<div class="my-block">This is a simple block</div>',
        category: 'Custom',
        attributes: {
            title: 'Insert h1 block',
            sok: 'Insert h1 block',
        },

    });
    editor.BlockManager.add('h1-block-1', {
        label: 'Heading 1',
        content: '<h1>Put your title here1</h1>',
        category: 'Custom',
        attributes: {
            title: 'Insert h1 block'
        }
    });
    editor.BlockManager.add('twitter', {
        name: 'Twitter Feed',
        category: 'Custom',
        label: '<b>Twitter Feed</b>',
        content: {
            attributes: {
                'wac-block': 'twitter',
            },
            traits: [
                {
                    label: 'Twitter',
                    name: 'twitter-title',
                    type: 'text',
                    value: '{{ platform.title }}'
                }
            ],
            activeOnRender: 1 ,
            content: `<div class="block">Twitter Feed</div>`,
        },
        attributes: {
            class: 'fab fa-twitter fa-1x'
        }
    });
    */
    ///// Add heading blocks (END) /////

    editor.I18n.addMessages({
        en: {
            styleManager: {
                properties: {
                    'background-repeat': 'Repeat',
                    'background-position': 'Position',
                    'background-attachment': 'Attachment',
                    'background-size': 'Size',
                }
            },
        }
    });

    cmdm.add('canvas-clear', function() {
        if(confirm('Are you sure to clean the canvas?')) {
            var comps = editor.DomComponents.clear();
            setTimeout(function(){ localStorage.clear()}, 0)
        }
    });
    cmdm.add('set-device-desktop', {
        run: function(ed) { ed.setDevice('Desktop') },
        stop: function() {},
    });
    cmdm.add('set-device-tablet', {
        run: function(ed) { ed.setDevice('Tablet') },
        stop: function() {},
    });
    cmdm.add('set-device-mobile', {
        run: function(ed) { ed.setDevice('Mobile portrait') },
        stop: function() {},
    });


    // Add info command
    /*const mdlClass = 'gjs-mdl-dialog-sm';
    const infoContainer = document.getElementById('info-panel');
    cmdm.add('open-info', function() {
        var mdlDialog = document.querySelector('.gjs-mdl-dialog');
        mdlDialog.className += ' ' + mdlClass;
        infoContainer.style.display = 'block';
        modal.setTitle('About this demo');
        modal.setContent(infoContainer);
        modal.open();
        modal.getModel().once('change:open', function() {
            mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
        })
    });
    pn.addButton('options', {
        id: 'open-info',
        className: 'fa fa-question-circle',
        command: function() { editor.runCommand('open-info') },
        attributes: {
            'title': 'About',
            'data-tooltip-pos': 'bottom',
        },
    });*/

    // const panelViews = pn.addPanel({
    //     id: "views"
    // });
    // panelViews.get("buttons").add([
    //     {
    //         attributes: {
    //             title: "Open Code"
    //         },
    //         className: "fa fa-file-code-o",
    //         command: "open-code",
    //         togglable: false, //do not close when button is clicked again
    //         id: "open-code"
    //     }
    // ]);

    // The `props` argument will contain only the properties you have declared in `script-props`
    const script = function(props) {
        const myLibOpts = {
            prop1: props.myprop1,
            prop2: props.myprop2,
        };
        console.log('My lib options: ' + JSON.stringify(myLibOpts));
    };

    c.addType('nj-casino-block-type', {
        model: {
            defaults: {
                script,
                // Define default values for your custom properties
                myprop1: 'value1',
                myprop2: '10',
                // Define traits, in order to change your properties
                traits: [
                    {
                        type: 'select',
                        name: 'myprop1',
                        changeProp: true,
                        options: [
                            { value: 'value1', name: 'Value 1' },
                            { value: 'value2', name: 'Value 2' },
                        ],
                    }, {
                        type: 'number',
                        name: 'myprop2',
                        changeProp: true,
                    }
                ],
                // Define which properties to pass (this will also reset your script on their changes)
                'script-props': ['myprop1', 'myprop2'],
                // ...
            }
        }
    });

    // Create a block for the component, so we can drop it easily
    b.add('nj-casino-block', {
        label: 'NJ Casino Block',
        category: 'Extra',
        attributes: { class: 'fa fa-twitter' },
        content: { type: 'nj-casino-block-type' },
    });

    // Simple warn notifier
    const origWarn = console.warn;
    toastr.options = {
        closeButton: true,
        preventDuplicates: true,
        showDuration: 250,
        hideDuration: 150
    };
    console.warn = function (msg) {
        if (msg.indexOf('[undefined]') === -1) {
            toastr.warning(msg);
        }
        origWarn(msg);
    };


    // Add and beautify tooltips
    [
        ['sw-visibility', 'Show Borders'],
        ['preview', 'Preview'],
        ['fullscreen', 'Fullscreen'],
        // ['export-template', 'Export'],
        ['undo', 'Undo'],
        ['redo', 'Redo'],
        // ['gjs-open-import-webpage', 'Import'],
        ['canvas-clear', 'Clear canvas']
    ].forEach(function(item) {
        pn.getButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
    });

    [
        ['open-sm', 'Style Manager'],
        ['open-layers', 'Layers'],
        ['open-blocks', 'Blocks']
    ].forEach(function(item) {
        pn.getButton('views', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
    });

    let titles = document.querySelectorAll('*[title]');

    for (let i = 0; i < titles.length; i++) {
        const el = titles[i];
        let title = el.getAttribute('title');
        title = title ? title.trim(): '';
        if(!title) {
            break;
        }
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
    }

    // Show borders by default
    pn.getButton('options', 'sw-visibility').set('active', 1);


    // Store and load events
    // editor.on('storage:load', function(e) { console.log('Loaded ', e) });
    // editor.on('storage:store', function(e) { console.log('Stored ', e) });


    /*// Do stuff on load
    editor.on('load', function() {
        // const $ = grapesjs.$;

        // Show logo with the version
        // const logoCont = document.querySelector('.gjs-logo-cont');
        // document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
        // const logoPanel = document.querySelector('.gjs-pn-commands');
        // logoPanel.appendChild(logoCont);

        // Load and show settings and style manager
        // const openTmBtn = pn.getButton('views', 'open-tm');
        // openTmBtn && openTmBtn.set('active', 1);
        // const openSm = pn.getButton('views', 'open-sm');
        // openSm && openSm.set('active', 1);

        // Add Settings Sector
        // const traitsSector = $(
        //     '<div class="gjs-sm-sector no-select">' +
        //     '<div class="gjs-sm-title"><span class="icon-settings fa fa-cog"></span> Settings</div>' +
        //     '<div class="gjs-sm-properties" style="display: none;"></div></div>'
        // );
        // const traitsProps = traitsSector.find('.gjs-sm-properties');
        // traitsProps.append($('.gjs-trt-traits'));
        // $('.gjs-sm-sectors').before(traitsSector);
        // traitsSector.find('.gjs-sm-title').on('click', function(){
        //     const traitStyle = traitsProps.get(0).style;
        //     const hidden = traitStyle.display === 'none';
        //     if (hidden) {
        //         traitStyle.display = 'block';
        //     } else {
        //         traitStyle.display = 'none';
        //     }
        // });

        // Open block manager
        // const openBlocksBtn = pn.getButton('views', 'open-blocks');
        // openBlocksBtn && openBlocksBtn.set('active', 1);
    });
    */

    window.editor = window.editor === undefined? editor : window.editor;
}

window.onload = function () {
    $(document).ready(function () {
        window.localStorage.clear();
        setUpEditor();
        $(window).resize(function() {
            clearTimeout( $.data( this, "resizeCheck" ) );
            $.data( this, "resizeCheck", setTimeout(function() {
                console.log("resizeCheck editor.refresh()");
                editor.refresh()
            }, 250) );
        });
        let timer = null;
        window.addEventListener('scroll', function() {
            if(timer !== null) {
                clearTimeout(timer);
            }
            timer = setTimeout(function (){
                console.log("scrollCheck editor.refresh()");
                editor.refresh()
            }, 150);
        }, false);

        setTimeout(function() {
            editor.refresh()
        }, 2000)
        // const formData = JSON.parse($('[name="data"]').val());
        // editor.formData = formData;
        // editor.render(formData);
        // console.log('s', formData);

        $('#layoutPageForm').submit(function (e) {
            e.preventDefault();
            return false;
        });

        $('#layoutPageForm .nj-form-save-button[type="submit"]').on("click", function (e) {
            e.preventDefault();
            $(this).loadingButton('loading')
            $('[name="data"]').val('');
            $('[name="html"]').val(editor.getHtml());
            $('[name="css"]').val(editor.getCss());
            $('[name="js"]').val(editor.getJs());
            setTimeout(function() {
                $('#layoutPageForm')[0].submit()
                console.log("o1")
            },3000)
            return false;
        });
    });
}
