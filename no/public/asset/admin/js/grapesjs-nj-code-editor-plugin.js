grapesjs.plugins.add('grapesjs-nj-code-editor', (editor, opts = {}) => {
    const pn = editor.Panels;
    const cmdm = editor.Commands;
    const dc = editor.DomComponents;
    const cm = editor.CodeManager;
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
            sender && sender.set('active', 0);
            nj_editor_modal.setTitle('Edit code');
            let html_viewer = htmlCodeViewer.editor;
            let css_viewer = cssCodeViewer.editor;

            nj_editor_modal.setContent('');
            nj_editor_modal.setContent(main_container_html);

            const html_textarea = document.createElement('textarea');
            const html_container = document.getElementById('gjs-nj-html-editor-dl');
            html_container.appendChild(html_textarea);
            htmlCodeViewer.init(html_textarea);
            html_viewer = htmlCodeViewer.editor;

            const css_textarea = document.createElement('textarea');
            const css_container = document.getElementById('gjs-nj-css-editor-dl');
            css_container.appendChild(css_textarea);
            cssCodeViewer.init(css_textarea);
            css_viewer = cssCodeViewer.editor;

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
});
