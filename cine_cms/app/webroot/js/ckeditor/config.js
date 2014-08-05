/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.toolbar = [
                       //['Source','-','Save','NewPage','Preview','-','Templates']
                       ['Source','NewPage','Preview','-','Templates']
                      //,['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker']
                      //,['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']
                      //,['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField']
                      ,'/'
                      //,['Bold','Italic','Underline','Strike','-','Subscript','Superscript']
                       ,['Bold','Italic','Underline']
                      ,['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
                      ,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
                      ,['Link','Unlink','Anchor']
                      //,['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak']
                       ,['Image','Table','HorizontalRule','PageBreak']
                      ,'/'
                      ,['Styles','Format','Font','FontSize']
                      ,['TextColor','BGColor']
                      //,['ShowBlocks']
                  ];

};

