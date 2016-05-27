function displayNotification(){
  var notification=document.getElementById('notification');
  var close=document.getElementById('closenotification');
  var text=document.getElementById('textnotification');
  notification.classList.toggle('hidden');
  close.style.display="none";
  text.style.display="none";
}

//DES BARS!!
// (function() {
//     document.onmousemove = handleMouseMove;
//     function handleMouseMove(event) {
//         var dot, eventDoc, doc, body, pageX, pageY;
//
//         event = event || window.event; // IE-ism
//
//         if (event.pageX == null && event.clientX != null) {
//             eventDoc = (event.target && event.target.ownerDocument) || document;
//             doc = eventDoc.documentElement;
//             body = eventDoc.body;
//
//             event.pageX = event.clientX +
//               (doc && doc.scrollLeft || body && body.scrollLeft || 0) -
//               (doc && doc.clientLeft || body && body.clientLeft || 0);
//             event.pageY = event.clientY +
//               (doc && doc.scrollTop  || body && body.scrollTop  || 0) -
//               (doc && doc.clientTop  || body && body.clientTop  || 0 );
//         }
//
//         moveNotification(event.pageX, event.pageY)
//         // Use event.pageX / event.pageY here
//     }
// })();
//
// function moveNotification(X, Y){
//   var notification=document.getElementById('notification');
//   notification.style.right=X+"px";
//   notification.style.top=Y+"px";
//
// }


(function() {
    document.onmousemove = handleMouseMove;
    function handleMouseMove(event) {
        var dot, eventDoc, doc, body, pageX, pageY;

        event = event || window.event; // IE-ism

        if (event.pageX == null && event.clientX != null) {
            eventDoc = (event.target && event.target.ownerDocument) || document;
            doc = eventDoc.documentElement;
            body = eventDoc.body;

            event.pageX = event.clientX +
              (doc && doc.scrollLeft || body && body.scrollLeft || 0) -
              (doc && doc.clientLeft || body && body.clientLeft || 0);
            event.pageY = event.clientY +
              (doc && doc.scrollTop  || body && body.scrollTop  || 0) -
              (doc && doc.clientTop  || body && body.clientTop  || 0 );
        }

        X=event.pageX;
        Y=event.pageY;
        console.log(X);
        console.log(Y);

        // Use event.pageX / event.pageY here
    }
})();

function moveNotification(){
  var notification=document.getElementById('notification');

  notification.style.right=X+"px";
  notification.style.bottom=-Y+"px";
}
