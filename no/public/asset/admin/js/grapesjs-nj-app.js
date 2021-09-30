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
            storageType: '',
            storeOnChange: true,
            storeAfterUpload: true,
            upload: window.gjs_assets_route,/*for temporary storage*/
            assets: window.gjs_assets,
            multiUpload: false,
            uploadName: 'file',
            params: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            DIS__uploadFile: function(e) {
                const files = e.dataTransfer ? e.dataTransfer.files : e.target.files;
                const formData = new FormData();
                for(const i in files){
                    formData.append('file-'+i, files[i]) //containing all the selected images from local
                }
                $.ajax({
                    url: '/location to your php page/upload_image.php',
                    type: 'POST',
                    data: formData,
                    contentType:false,
                    crossDomain: true,
                    dataType: 'json',
                    mimeType: "multipart/form-data",
                    processData:false,
                    success: function(result){
                        const images = [];
                        $.each( result['data'], function( key, value ) {
                            images[key] = value;
                        });
                        /*adding images to asset manager of GrapesJS*/
                        editor.AssetManager.add(images);
                    }
                });
            },
        },
        selectorManager: { componentFirst: true },
        styleManager: { clearProperties: 1 },
        plugins: [
            'grapesjs-touch',
            'grapesjs-parser-postcss',
            'grapesjs-tui-image-editor',
            'grapesjs-style-bg',
            'gjs-preset-webpage',
            'grapesjs-nj-blocks',
            'grapesjs-nj-code-editor',
            'grapesjs-nj-help-modal',
        ],
        pluginsOpts: {
            'gjs-preset-webpage': {
                formsOpts: false,
                showStylesOnChange: false,
            },
        },
    });

    const pn = editor.Panels;
    const bm = editor.BlockManager;
    const cmd = editor.Commands;
    const l = editor.I18n;

    // remove option buttons
    pn.removeButton('options', 'export-template');
    pn.removeButton('options', 'gjs-open-import-webpage');

    l.addMessages({
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

    cmd.add('canvas-clear', function() {
        if(confirm('Are you sure to clean the canvas?')) {
            var comps = editor.DomComponents.clear();
            setTimeout(function(){ localStorage.clear()}, 0)
        }
    });
    cmd.add('set-device-desktop', {
        run: function(ed) { ed.setDevice('Desktop') },
        stop: function() {},
    });
    cmd.add('set-device-tablet', {
        run: function(ed) { ed.setDevice('Tablet') },
        stop: function() {},
    });
    cmd.add('set-device-mobile', {
        run: function(ed) { ed.setDevice('Mobile portrait') },
        stop: function() {},
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

    // Replace title attribute to html tooltip popup
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

    // Do stuff on load
    editor.on('load', function() {
        bm.remove('countdown');
        bm.remove('map');
        bm.remove('link-block');
        bm.remove('h-navbar');
    });

    window.editor = window.editor === undefined? editor : window.editor;
}

window.onload = function () {
    $(document).ready(function () {
        window.localStorage.clear();
        setUpEditor();
        $(window).resize(function() {
            clearTimeout( $.data( this, "resizeCheck" ) );
            $.data( this, "resizeCheck", setTimeout(function() {
                // console.log("resizeCheck editor.refresh()");
                editor.refresh()
            }, 250) );
        });
        let timer = null;
        window.addEventListener('scroll', function() {
            if(timer !== null) {
                clearTimeout(timer);
            }
            timer = setTimeout(function (){
                // console.log("scrollCheck editor.refresh()");
                editor.refresh()
            }, 150);
        }, false);

        setTimeout(function() {
            editor.refresh()
        }, 2000)

        $('#layoutPageForm').submit(function (e) {
            e.preventDefault();
            return false;
        });

        $('#sendBulkEmail').submit(function (e) {
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
        $('#sendBulkEmail .sendBulkEmail').on('click',function (e) {
            e.preventDefault();
            $(this).loadingButton('loading')
            $('[name="data"]').val('');
            $('[name="html"]').val(editor.getHtml());
            $('[name="css"]').val(editor.getCss());
            $('[name="js"]').val(editor.getJs());

            setTimeout(function() {
                $('#sendBulkEmail')[0].submit()
                console.log("o1")
            },3000)
            return false;
        });
    });
}
