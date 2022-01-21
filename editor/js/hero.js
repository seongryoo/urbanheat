import { Swap, Upload } from './_icons';
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { TextareaControl, Button, Icon } = wp.components;
const { createElement } = wp.element;
const { MediaUpload, MediaUploadCheck, RichText } = wp.blockEditor;

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
                          el(Icon, {icon: Upload, className: 'admin-button__icon'}),
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
      const headingContentInput = el(
          TextareaControl,
          {
            label: __( 'Hero block heading' ),
            placeholder: __( 'Add heading text to be displayed on one side of the hero block' ),
            value: props.attributes.headingContent,
            onChange: (value) => {
              props.setAttributes({headingContent: value});
            },
          }
      );
      const captionContentInput = el(
          RichText,
          {
            value: props.attributes.captionContent,
            onChange: (value) => props.setAttributes({captionContent: value}),
            id: 'caption-content',
            className: 'admin-hero__container__side-content__rich-input',
          }
      )
      const captionContentInputLabel = el('label', {for: 'caption-content'}, 'Caption content to be displayed below heading');
      const captionContent = [captionContentInputLabel, captionContentInput];
      const imageSide = el(
          'div',
          {
            className: 'admin-hero__container__side-content admin-hero__container__side-content--image-side',
          },
          [sideImageUploadButton, sideImagePreview]
      );
      const textSide = el(
          'div',
          {
            className: 'admin-hero__container__side-content admin-hero__container__side-content--text-side',
          },
          [headingContentInput, captionContent]
      );
      const flipSides = el(
          Button,
          {
            onClick: () => {
              props.setAttributes({isImageLeft: !props.attributes.isImageLeft});
            }, 
            className: 'admin-button admin-hero__swap-sides'
          },
          [
            el(Icon, {icon: Swap, className: 'admin-button__icon'}), 
            __( props.attributes.isImageLeft ? 'Image on the left. Click to swap sides.' : 'Image on the right. Click to swap sides.' )]
      );
      const flexContainer = el(
          'div',
          {
            className: 'admin-hero__container'
          },
          props.attributes.isImageLeft ? [imageSide, textSide] : [textSide, imageSide]
      );
      return el(
          'div',
          {
            className: 'admin-hero'
          },
          [flexContainer, flipSides]
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