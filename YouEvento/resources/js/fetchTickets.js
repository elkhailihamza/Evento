// $(document).ready(function() {
//     $('#getTickets').on('click', fetchTickets);
// });

// function fetchTickets() {
//     var event_id = $('#getTickets').attr('data-event-id');
//     $.ajax({
//         url: '/tickets/get',
//         type: 'GET',
//         data: {
//             event_id,
//         },
//         success: function(data) {
//             console.log(data);
//             $('#selectTickets').html(data);
//         },
//         error: function(error) {
//             console.log(error);
//         },
//     });
// }