(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-55e48250"],{"3f52":function(t,e,n){"use strict";n.d(e,"y",(function(){return u})),n.d(e,"q",(function(){return a})),n.d(e,"x",(function(){return i})),n.d(e,"i",(function(){return o})),n.d(e,"j",(function(){return c})),n.d(e,"g",(function(){return d})),n.d(e,"k",(function(){return s})),n.d(e,"h",(function(){return f})),n.d(e,"r",(function(){return l})),n.d(e,"u",(function(){return p})),n.d(e,"a",(function(){return m})),n.d(e,"m",(function(){return h})),n.d(e,"w",(function(){return b})),n.d(e,"l",(function(){return j})),n.d(e,"n",(function(){return O})),n.d(e,"z",(function(){return g})),n.d(e,"p",(function(){return v})),n.d(e,"t",(function(){return w})),n.d(e,"s",(function(){return L})),n.d(e,"f",(function(){return y})),n.d(e,"e",(function(){return k})),n.d(e,"c",(function(){return I})),n.d(e,"d",(function(){return _})),n.d(e,"b",(function(){return C})),n.d(e,"v",(function(){return A})),n.d(e,"o",(function(){return P})),n.d(e,"A",(function(){return S}));var r=n("b775");function u(){return Object(r["a"])({url:"api/user/userInfo",method:"get"})}function a(t){return Object(r["a"])({url:"api/login/sendSms",method:"post",data:t})}function i(){return Object(r["a"])({url:"api/user/userCenter",method:"get"})}function o(){return Object(r["a"])({url:"api/user/myQrcode",method:"get"})}function c(){return Object(r["a"])({url:"api/user/myTicket",method:"get"})}function d(){return Object(r["a"])({url:"api/user/myCommission",method:"get"})}function s(){return Object(r["a"])({url:"api/user/myteam",method:"get"})}function f(){return Object(r["a"])({url:"api/user/myIntegral",method:"get"})}function l(){return Object(r["a"])({url:"api/user/serviceList",method:"get"})}function p(t){return Object(r["a"])({url:"api/user/transferRecord",method:"get",params:t})}function m(t){return Object(r["a"])({url:"api/user/addAppeal",method:"post",data:t})}function h(t){return Object(r["a"])({url:"api/user/rechargeIntegralList",method:"post",data:t})}function b(t,e){return Object(r["a"])({url:"api/user/upload",method:"post",data:{img:t,type:e}})}function j(){return Object(r["a"])({url:"api/user/rechargeInfo",method:"get"})}function O(t){return Object(r["a"])({url:"api/user/rewardList",method:"get",params:t})}function g(){return Object(r["a"])({url:"api/user/walletList",method:"get"})}function v(){return Object(r["a"])({url:"api/user/seeStrategy",method:"get"})}function w(){return Object(r["a"])({url:"api/user/transferInfo",method:"get"})}function L(t){return Object(r["a"])({url:"api/user/transferAction",method:"post",data:t})}function y(t){return Object(r["a"])({url:"api/user/editSecondPassword",method:"post",data:t})}function k(t){return Object(r["a"])({url:"api/user/editDefault",method:"post",data:t})}function I(t){return Object(r["a"])({url:"api/user/cashWithdrawal",method:"post",data:t})}function _(t){return Object(r["a"])({url:"api/user/delWallet",method:"post",data:t})}function C(t){return Object(r["a"])({url:"api/user/addWallet",method:"post",data:t})}function A(t){return Object(r["a"])({url:"api/user/updateInfo",method:"post",data:t})}function P(t,e,n,u){return Object(r["a"])({url:"api/wechat/scanPay",method:"post",data:{money:t,coupon_id:e,decintegral:n,deccommission:u}})}function S(t,e){return Object(r["a"])({url:"api/wechat/withdraw",method:"post",data:{commission:t,real_name:e}})}},6505:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("van-sticky",[n("van-nav-bar",{attrs:{title:"使用方法","left-arrow":""},on:{"click-left":t.onClickLeft}})],1),n("div",{staticClass:"htmldiv",domProps:{innerHTML:t._s(t.serviceList.config_value)}})],1)},u=[],a=n("3f52"),i={data:function(){return{serviceList:[]}},created:function(){this.getList()},methods:{getList:function(){var t=this;Object(a["p"])().then((function(e){t.serviceList=e}))},onClickLeft:function(){this.$router.go(-1)}}},o=i,c=(n("9d6e"),n("623f")),d=Object(c["a"])(o,r,u,!1,null,"0afd2593",null);e["default"]=d.exports},"7a20":function(t,e,n){},"9d6e":function(t,e,n){"use strict";var r=n("7a20"),u=n.n(r);u.a}}]);
//# sourceMappingURL=chunk-55e48250.23dfbb41.js.map