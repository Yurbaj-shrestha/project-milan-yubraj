const menuOpen = document.getElementById('menu-open');
const menuClose = document.getElementById('menu-close');
const sideBar = document.querySelector('.container .left-section');
const sidebarItems = document.querySelectorAll('.container .left-section .sidebar .item');

menuOpen.addEventListener('click', () => {
    sideBar.style.top = '0';
});

menuClose.addEventListener('click', () => {
    sideBar.style.top = '-60vh';
});

let activeItem = sidebarItems[0];

sidebarItems.forEach(element => {
    element.addEventListener('click', () => {
        if (activeItem) {
            activeItem.removeAttribute('id');
        }

        element.setAttribute('id', 'active');
        activeItem = element;

    });

    document.addEventListener('DOMContentLoaded', function () {
        // Function to handle calendar link click
        document.querySelector('.submenu li:nth-child(2) a').addEventListener('click', function (event) {
            event.preventDefault();
            openCalendar();
        });
        
        function openCalendar() {
            // Clear any existing content in the calendar container
            document.getElementById('calendarContainer').innerHTML = '';
    
            // Initialize FullCalendar
            $('#calendarContainer').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                events: [
                    {
                        title: 'Event 1',
                        start: '2024-01-10',
                        end: '2024-01-12'
                    },
                    // Add more events as needed
                ]
            });
        }
    });
    
    

});