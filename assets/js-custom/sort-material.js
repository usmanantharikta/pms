jQuery.extend( jQuery.fn.dataTableExt.oSort, {
  "date-uk-pre": function ( a ) {
   if (a == null || a == "") {
     return 0;
   }
   var ukDatea = a.split('-');
   return (ukDatea[2]) * 1;
},

"date-uk-asc": function ( a, b ) {
 return ((a < b) ? -1 : ((a > b) ? 1 : 0));
},

"date-uk-desc": function ( a, b ) {
 return ((a < b) ? 1 : ((a > b) ? -1 : 0));
}
} );
