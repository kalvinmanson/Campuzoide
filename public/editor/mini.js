/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'es';
	// config.uiColor = '#AADC6E';
	config.allowedContent = false;
	config.extraPlugins = 'codemirror';
	config.filebrowserBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserImageBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserImageUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=images';
	CKEDITOR.config.toolbar = [
	   ['Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Styles','Format','Font','FontSize'],
	   '/',
	   ['Bold','Italic','Underline','StrikeThrough','-','Outdent','Indent'],
	   '-',
	   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	   ['Image','Table','-','Link','Smiley','TextColor','BGColor','Source']
	];
};
