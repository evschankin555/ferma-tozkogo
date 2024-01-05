﻿angular.module('ngTableExport', [])
.config(['$compileProvider', function($compileProvider) {
    // allow data links
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|data):/);
}])
.directive('exportCsv', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        scope: false,
        link: function(scope, element, attrs) {
            var data = '';
            var csv = {
                stringify: function(str) {
                    return    str.replace(/^\s\s*/, '').replace(/\s*\s$/, '').replace(/"/g,'""');
                },
                generate: function() {
					data = '';
                    var rows = element.find('tr');
                    angular.forEach(rows, function(row, i) {
						var tr = angular.element(row),
                            tds = tr.find('th'),
                            rowData = '';
                        if (tr.hasClass('ng-table-filters')) {
                            return;
                        }
                        if (tds.length == 0) {
                            tds = tr.find('td');
                        }
                        //if (i != 1) {
                            angular.forEach(tds, function(td, i) {
                                rowData += csv.stringify(angular.element(td).text()) + ';';
                            });
                            rowData = rowData.slice(0, rowData.length - 1); //remove last semicolon
                       // }
                        data += rowData + "\n";
						
                    });
                },
                link: function() {
					var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(c){for(var a="",d,b,f,g,h,e,i=0,c=Base64._utf8_encode(c);i<c.length;)d=c.charCodeAt(i++),b=c.charCodeAt(i++),f=c.charCodeAt(i++),g=d>>2,d=(d&3)<<4|b>>4,h=(b&15)<<2|f>>6,e=f&63,isNaN(b)?h=e=64:isNaN(f)&&(e=64),a=a+this._keyStr.charAt(g)+this._keyStr.charAt(d)+this._keyStr.charAt(h)+this._keyStr.charAt(e);return a},decode:function(c){for(var a="",d,b,f,g,h,e=0,c=c.replace(/[^A-Za-z0-9\+\/\=]/g,"");e<c.length;)d=this._keyStr.indexOf(c.charAt(e++)),b=this._keyStr.indexOf(c.charAt(e++)),g=this._keyStr.indexOf(c.charAt(e++)),h=this._keyStr.indexOf(c.charAt(e++)),d=d<<2|b>>4,b=(b&15)<<4|g>>2,f=(g&3)<<6|h,a+=String.fromCharCode(d),64!=g&&(a+=String.fromCharCode(b)),64!=h&&(a+=String.fromCharCode(f));return a=Base64._utf8_decode(a)},_utf8_encode:function(c){for(var c=c.replace(/\r\n/g,"\n"),a="",d=0;d<c.length;d++){var b=c.charCodeAt(d);128>b?a+=String.fromCharCode(b):(127<b&&2048>b?a+=String.fromCharCode(b>>6|192):(a+=String.fromCharCode(b>>12|224),a+=String.fromCharCode(b>>6&63|128)),a+=String.fromCharCode(b&63|128))}return a},_utf8_decode:function(c){for(var a="",d=0,b=c1=c2=0;d<c.length;)b=c.charCodeAt(d),128>b?(a+=String.fromCharCode(b),d++):191<b&&224>b?(c2=c.charCodeAt(d+1),a+=String.fromCharCode((b&31)<<6|c2&63),d+=2):(c2=c.charCodeAt(d+1),c3=c.charCodeAt(d+2),a+=String.fromCharCode((b&15)<<12|(c2&63)<<6|c3&63),d+=3);return a}};
                    //return 'data:text/csv;base64,' + Base64.encode(data);//encodeURIComponent(data);
					 return 'data:text/csv;charset=CP1251,' + encodeURIComponent(data);
                }
            };
            $parse(attrs.exportCsv).assign(scope.$parent, csv);
        }
    };
}]);