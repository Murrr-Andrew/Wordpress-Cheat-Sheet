(()=>{"use strict";var e,t={597:()=>{const e=window.wp.blocks,t=window.wp.element,l=window.wp.i18n,o=window.wp.blockEditor,r=window.wp.components,n=window.wp.data,a=JSON.parse('{"u2":"create-block/example-dynamic"}');(0,e.registerBlockType)(a.u2,{edit:function({attributes:{numPosts:e,bgColor:a,textColor:s},setAttributes:c}){const i=(0,o.useBlockProps)(),p=(0,n.useSelect)((t=>t("core").getEntityRecords("postType","post",{per_page:e})),[e]);return p?(0,t.createElement)("div",{...i},(0,t.createElement)(o.InspectorControls,{key:"setting"},(0,t.createElement)("fieldset",null,(0,t.createElement)("legend",{className:"blocks-base-control__label"},(0,l.__)("Background color")),(0,t.createElement)(o.ColorPalette,{onChange:e=>{c({bgColor:e})}})),(0,t.createElement)("fieldset",null,(0,t.createElement)("legend",{className:"blocks-base-control__label"},(0,l.__)("Text color")),(0,t.createElement)(o.ColorPalette,{value:s,onChange:e=>{c({textColor:e})}})),(0,t.createElement)("fieldset",null,(0,t.createElement)("legend",{className:"blocks-base-control__label"},(0,l.__)("Number of posts")),(0,t.createElement)(r.TextControl,{type:"number",min:"0",value:e,onChange:e=>{c({numPosts:parseInt(e,10)||0})}}))),!!p.length&&p.map(((e,l)=>(0,t.createElement)("div",{style:{backgroundColor:a}},(0,t.createElement)("a",{key:l,href:e.link,style:{color:s}},e.title.rendered))))):null},save:function(){return null}})}},l={};function o(e){var r=l[e];if(void 0!==r)return r.exports;var n=l[e]={exports:{}};return t[e](n,n.exports,o),n.exports}o.m=t,e=[],o.O=(t,l,r,n)=>{if(!l){var a=1/0;for(p=0;p<e.length;p++){for(var[l,r,n]=e[p],s=!0,c=0;c<l.length;c++)(!1&n||a>=n)&&Object.keys(o.O).every((e=>o.O[e](l[c])))?l.splice(c--,1):(s=!1,n<a&&(a=n));if(s){e.splice(p--,1);var i=r();void 0!==i&&(t=i)}}return t}n=n||0;for(var p=e.length;p>0&&e[p-1][2]>n;p--)e[p]=e[p-1];e[p]=[l,r,n]},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={826:0,431:0};o.O.j=t=>0===e[t];var t=(t,l)=>{var r,n,[a,s,c]=l,i=0;if(a.some((t=>0!==e[t]))){for(r in s)o.o(s,r)&&(o.m[r]=s[r]);if(c)var p=c(o)}for(t&&t(l);i<a.length;i++)n=a[i],o.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return o.O(p)},l=globalThis.webpackChunkexample_dynamic=globalThis.webpackChunkexample_dynamic||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})();var r=o.O(void 0,[431],(()=>o(597)));r=o.O(r)})();