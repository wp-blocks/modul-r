!function(){"use strict";var e=window.wp.element,t=window.wp.blocks,n=window.wp.hooks,a=window.wp.compose,i=window.wp.blockEditor,o=window.wp.components,l=window.wp.primitives,s=(0,e.createElement)(l.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,e.createElement)(l.Path,{d:"M4 9v1.5h16V9H4zm12 5.5h4V13h-4v1.5zm-6 0h4V13h-4v1.5zm-6 0h4V13H4v1.5z"})),m=window.wp.i18n;const r="custom-media-text";(0,t.registerBlockVariation)("core/media-text",{name:r,title:"Custom media-text",icon:s,attributes:{className:"animated",align:"",additionalClassName:""},isActive:e=>e.namespace.includes(r)});const c=(0,a.createHigherOrderComponent)((t=>n=>{const{attributes:{namespace:a,additionalClassName:l},setAttributes:c,isSelected:d}=n;return a===r&&d?(0,e.createElement)(e.Fragment,null,(0,e.createElement)(t,n),(0,e.createElement)(i.InspectorControls,null,(0,e.createElement)(o.PanelBody,{key:a,title:"Custom ClassName",icon:s,initialOpen:!0},(0,e.createElement)(o.TextControl,{label:(0,m.__)("Additional Image Classname"),value:l,onChange:e=>c({additionalClassName:e})})))):(0,e.createElement)(t,n)}),"withInspectorControl");(0,n.addFilter)("editor.BlockEdit",r,c)}();
//# sourceMappingURL=modulr-blocks-cmt.js.map