
(function () {
    'use strict';

    var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

    var register$1 = function (editor) {
      editor.addCommand('InsertHorizontalRule', function () {
        editor.execCommand('mceInsertContent', false, '<hr />');
      });
    };

    var register = function (editor) {
      var onAction = function () {
        return editor.execCommand('InsertHorizontalRule');
      };
      editor.ui.registry.addButton('hr', {
        icon: 'horizontal-rule',
        tooltip: 'Horizontal line',
        onAction: onAction
      });
      editor.ui.registry.addMenuItem('hr', {
        icon: 'horizontal-rule',
        text: 'Horizontal line',
        onAction: onAction
      });
    };

    function Plugin () {
      global.add('hr', function (editor) {
        register$1(editor);
        register(editor);
      });
    }

    Plugin();

}());
