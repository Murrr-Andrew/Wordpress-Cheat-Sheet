(()=>{"use strict";var e,r={165:()=>{const e=window.wp.blocks;function r(){return r=Object.assign?Object.assign.bind():function(e){for(var r=1;r<arguments.length;r++){var t=arguments[r];for(var o in t)Object.prototype.hasOwnProperty.call(t,o)&&(e[o]=t[o])}return e},r.apply(this,arguments)}const t=window.wp.element,o=(window.wp.i18n,window.wp.blockEditor),n=window.wp.components,s=JSON.parse('{"u2":"create-block/basic-block"}');(0,e.registerBlockType)(s.u2,{edit:function({attributes:e,setAttributes:s}){const a=(0,o.useBlockProps)();return(0,t.createElement)(n.TextControl,r({},a,{value:e.message,onChange:e=>s({message:e})}))},save:function({attributes:e}){const r=o.useBlockProps.save();return(0,t.createElement)("div",r,e.message)}})}},t={};function o(e){var n=t[e];if(void 0!==n)return n.exports;var s=t[e]={exports:{}};return r[e](s,s.exports,o),s.exports}o.m=r,e=[],o.O=(r,t,n,s)=>{if(!t){var a=1/0;for(p=0;p<e.length;p++){for(var[t,n,s]=e[p],i=!0,c=0;c<t.length;c++)(!1&s||a>=s)&&Object.keys(o.O).every((e=>o.O[e](t[c])))?t.splice(c--,1):(i=!1,s<a&&(a=s));if(i){e.splice(p--,1);var l=n();void 0!==l&&(r=l)}}return r}s=s||0;for(var p=e.length;p>0&&e[p-1][2]>s;p--)e[p]=e[p-1];e[p]=[t,n,s]},o.o=(e,r)=>Object.prototype.hasOwnProperty.call(e,r),(()=>{var e={826:0,431:0};o.O.j=r=>0===e[r];var r=(r,t)=>{var n,s,[a,i,c]=t,l=0;if(a.some((r=>0!==e[r]))){for(n in i)o.o(i,n)&&(o.m[n]=i[n]);if(c)var p=c(o)}for(r&&r(t);l<a.length;l++)s=a[l],o.o(e,s)&&e[s]&&e[s][0](),e[s]=0;return o.O(p)},t=globalThis.webpackChunkbasic_block=globalThis.webpackChunkbasic_block||[];t.forEach(r.bind(null,0)),t.push=r.bind(null,t.push.bind(t))})();var n=o.O(void 0,[431],(()=>o(165)));n=o.O(n)})();