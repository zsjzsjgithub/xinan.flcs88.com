(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-94a07d06"],{5244:function(t,n,r){},"684f":function(t,n,r){"use strict";var e=r("5244"),i=r.n(e);i.a},e4a7:function(t,n,r){"use strict";r.r(n);var e=function(){var t=this,n=t.$createElement,r=t._self._c||n;return r("div",[r("van-sticky",[r("van-nav-bar",{attrs:{title:"物流信息","left-arrow":""},on:{"click-left":t.onClickLeft}})],1),0==t.logisticsInfo.length?r("div",{staticClass:"noData"},[t._v("\n    暂无物流信息!\n  ")]):r("van-steps",{attrs:{direction:"vertical",active:0,"active-color":"#333333"}},t._l(t.logisticsInfo,(function(n){return r("van-step",[r("div",[t._v(t._s(n.context))]),r("p",[t._v(t._s(n.ftime))])])})),1)],1)},i=[],o=r("f8b7"),a={data:function(){return{id:"",logisticsInfo:[]}},created:function(){var t=this;this.id=this.$route.query.id,Object(o["b"])(this.id).then((function(n){t.logisticsInfo=n}))},methods:{onClickLeft:function(){this.$router.go(-1)}}},c=a,s=(r("684f"),r("623f")),u=Object(s["a"])(c,e,i,!1,null,"ac4e003a",null);n["default"]=u.exports},f8b7:function(t,n,r){"use strict";r.d(n,"d",(function(){return i})),r.d(n,"c",(function(){return o})),r.d(n,"a",(function(){return a})),r.d(n,"e",(function(){return c})),r.d(n,"b",(function(){return s}));var e=r("b775");function i(t){return Object(e["a"])({url:"api/orders/orderList",method:"get",params:{status:t}})}function o(t){return Object(e["a"])({url:"api/orders/orderDetail",method:"get",params:{id:t}})}function a(t){return Object(e["a"])({url:"api/orders/cancelOrders",method:"post",params:{id:t}})}function c(t){return Object(e["a"])({url:"api/orders/sure",method:"post",params:{id:t}})}function s(t){return Object(e["a"])({url:"api/orders/logisticsInfo",method:"get",params:{id:t}})}}}]);
//# sourceMappingURL=chunk-94a07d06.9ae9691f.js.map