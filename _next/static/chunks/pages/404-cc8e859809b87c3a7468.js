(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[2197],{4074:function(e,t,n){"use strict";n.d(t,{p:function(){return T}});var l,s=n(67294),r=n(9960),a=n(37797),o=n(11812),u=n(92877),i=n(57994),c=n(50542),d=n(59678),p=n(8154),f=n(7255);let m=null!=(l=s.startTransition)?l:function(e){e()};var x,h=n(29564),g=((x=g||{})[x.Open=0]="Open",x[x.Closed=1]="Closed",x),y=(e=>(e[e.ToggleDisclosure=0]="ToggleDisclosure",e[e.CloseDisclosure=1]="CloseDisclosure",e[e.SetButtonId=2]="SetButtonId",e[e.SetPanelId=3]="SetPanelId",e[e.LinkPanel=4]="LinkPanel",e[e.UnlinkPanel=5]="UnlinkPanel",e))(y||{});let P={0:e=>({...e,disclosureState:(0,d.E)(e.disclosureState,{0:1,1:0})}),1:e=>1===e.disclosureState?e:{...e,disclosureState:1},4:e=>!0===e.linkedPanel?e:{...e,linkedPanel:!0},5:e=>!1===e.linkedPanel?e:{...e,linkedPanel:!1},2:(e,t)=>e.buttonId===t.buttonId?e:{...e,buttonId:t.buttonId},3:(e,t)=>e.panelId===t.panelId?e:{...e,panelId:t.panelId}},k=(0,s.createContext)(null);function b(e){let t=(0,s.useContext)(k);if(null===t){let t=new Error(`<${e} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(t,b),t}return t}k.displayName="DisclosureContext";let v=(0,s.createContext)(null);function E(e){let t=(0,s.useContext)(v);if(null===t){let t=new Error(`<${e} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(t,E),t}return t}v.displayName="DisclosureAPIContext";let I=(0,s.createContext)(null);function S(e,t){return(0,d.E)(t.type,P,e,t)}I.displayName="DisclosurePanelContext";let w=s.Fragment;let N=f.AN.RenderStrategy|f.AN.Static;let D=(0,f.yV)((function(e,t){let{defaultOpen:n=!1,...l}=e,a=(0,s.useRef)(null),o=(0,u.T)(t,(0,u.h)((e=>{a.current=e}),void 0===e.as||e.as===s.Fragment)),c=(0,s.useRef)(null),m=(0,s.useRef)(null),x=(0,s.useReducer)(S,{disclosureState:n?0:1,linkedPanel:!1,buttonRef:m,panelRef:c,buttonId:null,panelId:null}),[{disclosureState:h,buttonId:g},y]=x,P=(0,r.z)((e=>{y({type:1});let t=(0,p.r)(a);if(!t||!g)return;let n=e?e instanceof HTMLElement?e:e.current instanceof HTMLElement?e.current:t.getElementById(g):t.getElementById(g);null==n||n.focus()})),b=(0,s.useMemo)((()=>({close:P})),[P]),E=(0,s.useMemo)((()=>({open:0===h,close:P})),[h,P]),I={ref:o};return s.createElement(k.Provider,{value:x},s.createElement(v.Provider,{value:b},s.createElement(i.up,{value:(0,d.E)(h,{0:i.ZM.Open,1:i.ZM.Closed})},(0,f.sY)({ourProps:I,theirProps:l,slot:E,defaultTag:w,name:"Disclosure"}))))})),R=(0,f.yV)((function(e,t){let n=(0,a.M)(),{id:l=`headlessui-disclosure-button-${n}`,...i}=e,[d,p]=b("Disclosure.Button"),m=(0,s.useContext)(I),x=null!==m&&m===d.panelId,g=(0,s.useRef)(null),y=(0,u.T)(g,t,x?null:d.buttonRef),P=(0,f.Y2)();(0,s.useEffect)((()=>{if(!x)return p({type:2,buttonId:l}),()=>{p({type:2,buttonId:null})}}),[l,p,x]);let k=(0,r.z)((e=>{var t;if(x){if(1===d.disclosureState)return;switch(e.key){case h.R.Space:case h.R.Enter:e.preventDefault(),e.stopPropagation(),p({type:0}),null==(t=d.buttonRef.current)||t.focus()}}else switch(e.key){case h.R.Space:case h.R.Enter:e.preventDefault(),e.stopPropagation(),p({type:0})}})),v=(0,r.z)((e=>{switch(e.key){case h.R.Space:e.preventDefault()}})),E=(0,r.z)((t=>{var n;(0,c.P)(t.currentTarget)||e.disabled||(x?(p({type:0}),null==(n=d.buttonRef.current)||n.focus()):p({type:0}))})),S=(0,s.useMemo)((()=>({open:0===d.disclosureState})),[d]),w=(0,o.f)(e,g),N=x?{ref:y,type:w,onKeyDown:k,onClick:E}:{ref:y,id:l,type:w,"aria-expanded":0===d.disclosureState,"aria-controls":d.linkedPanel?d.panelId:void 0,onKeyDown:k,onKeyUp:v,onClick:E};return(0,f.sY)({mergeRefs:P,ourProps:N,theirProps:i,slot:S,defaultTag:"button",name:"Disclosure.Button"})})),C=(0,f.yV)((function(e,t){let n=(0,a.M)(),{id:l=`headlessui-disclosure-panel-${n}`,...r}=e,[o,c]=b("Disclosure.Panel"),{close:d}=E("Disclosure.Panel"),p=(0,f.Y2)(),x=(0,u.T)(t,o.panelRef,(e=>{m((()=>c({type:e?4:5})))}));(0,s.useEffect)((()=>(c({type:3,panelId:l}),()=>{c({type:3,panelId:null})})),[l,c]);let h=(0,i.oJ)(),g=null!==h?(h&i.ZM.Open)===i.ZM.Open:0===o.disclosureState,y=(0,s.useMemo)((()=>({open:0===o.disclosureState,close:d})),[o,d]),P={ref:x,id:l};return s.createElement(I.Provider,{value:o.panelId},(0,f.sY)({mergeRefs:p,ourProps:P,theirProps:r,slot:y,defaultTag:"div",features:N,visible:g,name:"Disclosure.Panel"}))})),T=Object.assign(D,{Button:R,Panel:C})},18125:function(e,t,n){"use strict";n.r(t),n.d(t,{default:function(){return o}});var l=n(85893),s=(n(67294),n(41664)),r=n(9008),a=n(4074);function o(){return(0,l.jsxs)(l.Fragment,{children:[(0,l.jsx)(r.default,{children:(0,l.jsx)("title",{children:"Page Not Found"})}),(0,l.jsx)(a.p,{as:"section",className:"bg-white py-10 md:py-20 mt-1",children:(0,l.jsx)("div",{className:"max-w-5xl mx-auto px-4 sm:px-6",children:(0,l.jsxs)("div",{className:"grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 py-16",children:[(0,l.jsx)("div",{children:(0,l.jsx)("img",{src:"/access/img/404.svg",alt:"Error 500",className:"w-full"})}),(0,l.jsxs)("div",{className:"ml-20 mt-20",children:[(0,l.jsx)("h6",{className:"text-gray-800 mb-5 text-2xl font-bold",children:"Opss..."}),(0,l.jsx)("h1",{className:"text-pink-600 text-4xl font-bold",children:"Page Not Found"}),(0,l.jsx)("p",{className:"text-lg py-5 text-gray-600 block mb-2",children:"Looks like you followed a bad link. If you think this is a problem with us, please tell us."}),(0,l.jsx)(s.default,{href:"/",children:(0,l.jsx)("a",{className:"table px-10 py-4 rounded-md bg-pink-600 text-white font-medium hover:bg-pink-700",children:"Go back home"})})]})]})})})]})}},72448:function(e,t,n){(window.__NEXT_P=window.__NEXT_P||[]).push(["/404",function(){return n(18125)}])}},function(e){e.O(0,[2632,9774,2888,179],(function(){return t=72448,e(e.s=t);var t}));var t=e.O();_N_E=t}]);