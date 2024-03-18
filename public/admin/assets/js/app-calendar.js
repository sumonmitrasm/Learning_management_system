
//Full Calendar
document.addEventListener('DOMContentLoaded', function () {
	var containerEl = document.getElementById('external-events');
	new FullCalendar.Draggable(containerEl, {
		itemSelector: '.fc-event',
		eventData: function (eventEl) {
			return {
				title: eventEl.innerText.trim(),
				title: eventEl.innerText,
				className: eventEl.className + ' overflow-hidden '
			}
		}
	});
	var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
		},

		defaultView: 'month',
		navLinks: true, // can click day/week names to navigate views
		businessHours: true, // display business hours
		editable: true,
		selectable: true,
		selectMirror: true,
		droppable: true, // this allows things to be dropped onto the calendar
		select: function (arg) {
			var title = prompt('Event Title:');
			if (title) {
				calendar.addEvent({
					title: title,
					start: arg.start,
					end: arg.end,
					allDay: arg.allDay
				})
			}
			calendar.unselect()
		},
		eventClick: function (arg) {
			if (confirm('Are you sure you want to delete this event?')) {
				arg.event.remove()
			}
		},
		editable: true,
		dayMaxEvents: true, // allow "more" link when too many events
		events: [{
			title: 'Business Lunch',
			start: '2022-06-03T13:00:00',
			constraint: 'businessHours'
		}, {
			title: 'Meeting',
			start: '2022-06-13T11:00:00',
			constraint: 'availableForMeeting', // defined below
			// color: '#38cab3'
		}, {
			title: 'Conference',
			start: '2022-06-18',
			end: '2022-06-20',
			color: '#f74f75'
		}, {
			title: 'Party',
			start: '2022-06-29T20:00:00',
			color: '#ffbd5a'
		},
		// areas where "Meeting" must be dropped
		{
			id: 'availableForMeeting',
			start: '2022-06-11T10:00:00',
			end: '2022-06-11T16:00:00',
			rendering: 'background',
			// color: '#f34343'
		}, {
			id: 'availableForMeeting',
			start: '2022-06-13T10:00:00',
			end: '2022-06-13T16:00:00',
			rendering: '#4ec2f0'
		}, {
			title: 'Jyo birthday',
			id: 'Jyo birthday',
			start: '2021-12-19T10:00:00',
			end: '2021-12-19T16:00:00',
			rendering: '#4ec2f0'
		}, {
			title: 'Chandu birthday',
			id: 'Jyo birthday',
			start: '2022-06-30T10:00:00',
			end: '2022-06-30T16:00:00',
			rendering: '#4ec2f0'
		}, {
			title: 'Spruko Meetup',
			id: 'Spruko Meetup',
			start: '2022-06-25T10:00:00',
			end: '2022-06-25T16:00:00',
			color: '#f74f75'
		},
		]
	});

	calendar.render();
});
$(function() {
	

/***************** RTL HAs Class *********************/
let bodyRtl = $('body').hasClass('rtl');
if (bodyRtl) {
	$('.fc-theme-standard').removeClass('fc-direction-ltr');
	$('.fc-theme-standard').addClass('fc-direction-rtl');
	$('.fc-header-toolbar').removeClass('fc-toolbar-ltr');
	$('.fc-header-toolbar').addClass('fc-toolbar-rtl');
}
/***************** RTL HAs Class *********************/

})