(function(wp) {
  const { __ } = wp.i18n;
  const { registerBlockType } = wp.blocks;
  const { TextareaControl, Button, Icon } = wp.components;
  const { createElement } = wp.element;
  const { MediaUpload, MediaUploadCheck } = wp.blockEditor;

  const el = createElement;
  
  registerBlockType( 'urbanheat/hero-block', {
      edit: (props) => {
        const sideImageUploadButton = el(
            MediaUploadCheck,
            {},
            el(
                MediaUpload,
                {
                    onSelect: (media) => {
                      props.setAttributes({
                        sideImageId: media.id,
                        sideImageUrl: media.url,
                        sideImageAlt: media.alt,
                      })
                    },
                    value: props.attributes.sideImageId,
                    render: ({open}) => {
                      return el(
                          Button,
                          {onClick: open},
                          [
                            el(Icon, {icon: "upload"}),
                            __( 'Upload image for hero block' )
                          ]
                      )
                    }
                }
            )
        );
        const sideImagePreview = el(
            'img',
            {
              src: props.attributes.sideImageUrl,
              alt: props.attributes.sideImageAlt,
            }
        );
        const sideTextInput = el(
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
        return el(
            'div',
            {},
            [sideImageUploadButton, sideImagePreview, sideTextInput]
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