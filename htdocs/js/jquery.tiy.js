/**
 * Created by Administrator on 2016/10/16.
 */
;(function ($) {
    $.fn.extend({
        "color":function (value) {
            return this.css("color",value);
        },
        "alterBgColor":function (options) {
            return this.each(function () {
                options=$.extend({
                    odd:"odd",
                    even:"even",
                    selected:"selected"
                },options);
                $("tbody>tr:odd",this).addClass(options.odd);
                $("tbody>tr:even",this).addClass(options.even);
                $("tbody>tr",this).click(function () {
                    var hasselected=$(this).hasClass(options.selected);
                    $(this)[hasselected?"removeClass":"addClass"](options.selected)
                        .find(":checkbox").attr("checked",!hasselected);
                });
                $("tbody>tr:has(:checked)",this).addClass(options.selected);
                return this;
            })
        }
    });
    $.extend({
        ltrim:function (text) {
            return(text||"").replace(/^\s+/g,"");
        },
        rtrim:function (text) {
            return(text||"").replace(/\s+$/g,"")
        }
    });
    $.extend(jQuery.expr[":"],{
        between:function (a,i,m) {
            var tmp=m[3].split(",");
            return tmp[0]-0<i&&i<tmp[1]-0;
        }
    })
})(jQuery);