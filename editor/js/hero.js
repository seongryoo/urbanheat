(function(wp) {
  const el = wp.element.createElement;
  const InnerBlocks = wp.blockEditor.InnerBlocks;
  const registerBlockType = wp.blocks.registerBlockType;
  registerBlockType(
    'urbanheat/hero-block',
    {
      title: 'Hero Block',
      category: 'design',
      icon: 'superhero-alt',
      edit: (props) => {
        return <div>Ya</div>;
      },
      save: (props) => {
        return null;
      },
    }
  );
})(window.wp);