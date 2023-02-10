function updateTime() {
  var dateInfo = new Date();

  /* time */
  var hr,
    _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
    sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
    ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";

  // replace 0 with 12 at midnight, subtract 12 from hour if 13–23
  if (dateInfo.getHours() == 0) {
    hr = 12;
  } 
  else if (dateInfo.getHours() > 12) {
    hr = dateInfo.getHours() - 12;
  } 
  else {
    hr = dateInfo.getHours();
  }

  var currentTime = hr + ":" + _min + ":" + sec;

  // print time
  document.getElementsByClassName("hms")[0].innerHTML = currentTime;
  document.getElementsByClassName("ampm")[0].innerHTML = ampm;

  /* date */
  var dow = [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    month = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ],
    day = dateInfo.getDate();

  // store date
  var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;

  document.getElementsByClassName("date")[0].innerHTML = currentDate;

};

// print time and date once, then update them every second
updateTime();
setInterval(function() {
  updateTime()
}, 1000);

//change of style in buttons
const button1 = document.querySelector('.button1');
let index = 1; 
const colors = ['#4CAF50', '#af4c4c'];

button1.addEventListener('click', function handleClick(){
  button1.style.backgroundColor = colors[index];
  button1.style.color = 'white';

  const initialText = 'Time In';

  if (button1.textContent.toLowerCase().includes(initialText.toLowerCase())) {
    button1.innerHTML = '<span>Time Out</span>';
    //document.getElementById("button1").setAttribute("value","Time Out");
    
  } 
  else
  button1.textContent = initialText;
    
  index = index >= colors.length - 1 ? 0 : index + 1;

}); 

//display time when button is pressed
function displayTime() {

  if(index == 1) {
    let confirmtext = "TIME IN ?";

    if (confirm(confirmtext) == true) {
      confirmtext = "Time in sucessfull!";  
      //TO BE ASKED IF NEED PA IDISPLAY YUNG TIME AND DATE OR TIME IN SUCCESFULL NA LANG 
  
      var stringTime = new Date();
              var time_in = stringTime.toLocaleString([], {
                  hour: '2-digit',
                  minute: '2-digit'
              });
      document.getElementById("time_in").innerHTML = time_in;
      
      //display DATE FORMAT: DAY-Month-DD-YYYY
      const date_today = new Date();
      document.getElementById('date_today').innerHTML = date_today.toDateString();

      const d = new Date();
      let day = d.getDay()
      document.getElementById("has_schedule").innerHTML = day;
    } 
    else {
      confirmtext = "Time in canceled!";
    }
    document.getElementById('demo2').innerHTML = confirmtext;
  }
  else {
    let confirmtext = "TIME OUT ?"

    if (confirm(confirmtext) == true) {
      confirmtext = "Time out sucessfull!";  
      //TO BE ASKED IF NEED PA IDISPLAY YUNG TIME AND DATE OR TIME IN SUCCESFULL NA LANG 
  
      var stringTime = new Date();
              var time_out = stringTime.toLocaleString([], {
                  hour: '2-digit',
                  minute: '2-digit'
              });
      document.getElementById("time_out").innerHTML = time_out;
      
      //display DATE FORMAT: DAY-Month-DD-YYYY
      const date_today = new Date();
      document.getElementById('date_today').innerHTML = date_today.toDateString();

      const d = new Date();
      let day = d.getDay()
      document.getElementById("has_schedule").innerHTML = day;
    } 
    else {
      confirmtext = "Time out canceled!";
    }
    document.getElementById('demo2').innerHTML = confirmtext;
  }
};

// get values from the site and send it to db
// in this case ang makukuhang value is time in and time out ONLY
/* PROCESS: 
1. click TIME IN button (function above)
2. check if has_schedule, if yes, 3rd step, if no 'sorry you don't have sched today'          
3. store timeIn-value to 'time_in'
4. Compare and insert value to status_timeIn whether 'Late' , 'On-time'
5. click TIME OUT button (function above)
6. store timeOut-value to 'time_out'
7. Compare and insert value to status_timeOute whether 'On-time', 'Early out'
*/

/*function insertAttendance (schedule_ID, employee_ID, time_in, time_out, date_today, has_schedule,
                          is_approved_overtime, status_timein, status_timeout) {
  $.ajax({
      url: './app/insertAttendance.php',
      method: "POST",
      data: {
        //"DATABASE" : CLIENT SIDE 
        "schedule_ID" : schedule_ID,
        "employee_ID" :employee_ID, 
        "time_in": time_in, 
        "time_out": time_out, 
        "date_today": date_today, 
        "has_schedule":has_schedule,
        "is_approved_overtime" :is_approved_overtime, 
        "status_timein": status_timein, 
        "status_timeout": status_timeout
      },
      dataType: "json",
      success: function(id) {

        if(id != 0) {
            //ADD NEW ROw          
        }

      }


  }) 
}*/
