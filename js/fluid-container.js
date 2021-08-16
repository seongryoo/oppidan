/* Section block -------------------------------------- */
(function(wp) {
  const el = wp.element.createElement;
  const InnerBlocks = wp.blockEditor.InnerBlocks;
  const registerBlock = wp.blocks.registerBlockType;
  const groupArgs = {
    title: 'Fluid Container',
    category: 'design',
    icon: 'editor-insertmore',

    edit: function(props) {
      return el(
          'div', {
            className: props.className + ' oppidan-fluid',
          },
          el(InnerBlocks, {
            renderAppender: () => el(InnerBlocks.ButtonBlockAppender),
          })
      );
    },

    save: function(props) {
      return el(
          'div',
          {
            className: 'fluid-container',
          },
          InnerBlocks.Content
      );
    },
    /* end of save() */

  }; /* end of containerArgs obj*/

  registerBlock('oppidan/fluid-container', groupArgs);
})(window.wp);
