grapesjs.plugins.add('grapesjs-nj-help-modal', (editor, opts = {}) => {
    const pn = editor.Panels;
    const cmd = editor.Commands;
    const nj_help_modal = editor.Modal;
    const main_container_help_html = `
        <h4>How To Add Banner</h4>
        <ul>
            <li>First add Image</li>
            <li>Then add image class. you can add image class on edit code click (img class="layout-page-banner") Image Class by default set 'layout-page-banner'(This is only for banner not other images). With this class you have no need to set image properties like position, width, height etc.</li>
        </ul>
        <h4>Shortcodes Examples</h4>
        [casinos ids="10,29,28,27"]<br>
        [games ids="2,8,9,131"]<br>
        [faq ids="1,2,3,4,5" heading="Faq Heading"]<br>
        [news ids="17,16,18"]<br>
        [softwares ids="20,22,23"]
        <p>You can add multiples ids in one shortcode with commas</p>
    `;
    cmd.add('html-help', {
        run: function(editor, sender) {
            sender && sender.set('active', 0);
            nj_help_modal.setTitle('Help');
            nj_help_modal.setContent(main_container_help_html);
            nj_help_modal.open();
        }
    });
    pn.addButton('options', [{
        id: 'help',
        className: 'fa fa-question',
        command: 'html-help',
        attributes: {
            title: 'Help code'
        }
    }]);
});
