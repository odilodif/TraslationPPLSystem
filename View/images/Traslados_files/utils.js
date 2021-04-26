function dateSystem(){
  var today  = new Date();
  //var day=(parseInt(today.getDate()) < 10) ? '0'+parseInt(today.getDate() : parseInt(today.getDate();
  var day=(parseInt(today.getDate())<10) ? ('0'+today.getDate()) : today.getDate();
  var month=(parseInt(today.getMonth()+1) < 10) ? '0'+(today.getMonth()+1) :(today.getMonth()+1) ;
  var year= today.getFullYear();
  var trasl_date_request= year + '-' + month + '-' +day;
  return trasl_date_request;
}
