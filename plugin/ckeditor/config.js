/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.height = '150px';

    config.filebrowserBrowseUrl = 'plugin/ckfinder/ckfinder.html';

    config.filebrowserImageBrowseUrl = 'plugin/ckfinder/ckfinder.html?type=Images';

    config.filebrowserFlashBrowseUrl = 'plugin/ckfinder/ckfinder.html?type=Flash';

    config.filebrowserUploadUrl = 'plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

    //config.filebrowserImageUploadUrl = 'plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

    //config.filebrowserFlashUploadUrl = 'plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
