(function(wp) {
  const { __ } = wp.i18n;
  const { registerBlockType } = wp.blocks;
  const { TextareaControl } = wp.components;
  const { createElement } = wp.element;
  const { MediaUpload, MediaUploadCheck } = wp.blockEditor;

  const el = createElement;
  
  registerBlockType( 'urbanheat/hero-block', {
      edit: (props) => {
        return el(
            TextareaControl,
            {
              label: __( 'Hero block text' ),
              placeholder: __( 'Add text to be displayed on one side of the hero block' ),
              value: props.attributes.sideText,
              onChange: (value) => {
                props.setAttributes({sideText: value});
              },
            }
        );
      },
      save: (props) => {
        return null;
      },
      title: 'Hero Block',
      category: 'design',
      icon: 'superhero-alt',
    }
  );
})(window.wp);