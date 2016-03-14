var month = 6;

function showCalendar(month) {
  var cal = document.getElementsByClassName('cal');
  for (var i = 0; i < cal.length; i++) {
    if (month == i) {
      cal[i].classList.add('selected');
    } else {
      cal[i].classList.remove('selected');
    }
  }
}

function changeCal(sens) {
  if (sens == 1 && month < 12) {
    month++;
  } else if (sens == -1 && month > 0) {
    month--;
  }
  showCalendar(month);
}

function refreshCal(e) {
  var events = document.getElementsByClassName('event');
  for (var i = 0; i < events.length; i++) {
    if (events[i].getAttribute('calendrier') == e.getAttribute('calendrier')) {
      events[i].classList.toggle('hidden');
    }
  }
}


function showModal(e) {
  var day = e.getAttribute('day');
  var calendar = e.getAttribute('calendrier');
  var id = e.getAttribute('num');
  var modals = document.getElementsByClassName("modal");
  for (var i = 0; i < modals.length; i++) {
    if (modals[i].getAttribute('day') == day && modals[i].getAttribute('calendrier') == calendar && modals[i].getAttribute('num') == id) {
      modals[i].classList.toggle('show');
    }
  }
}

function hideModal(e) {
  e.parentElement.parentElement.classList.remove('show');
}

showCalendar(month);
