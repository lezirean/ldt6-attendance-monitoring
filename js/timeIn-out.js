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
  } else if (dateInfo.getHours() > 12) {
    hr = dateInfo.getHours() - 12;
  } else {
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

const button1 = document.querySelector('.button1');

let index = 1; 
const colors = ['#4CAF50', '#af4c4c'];


button1.addEventListener('click', function handleClick(){
  button1.style.backgroundColor = colors[index];
  button1.style.color = 'white';

  const initialText = 'Time In';

  if (button1.textContent.toLowerCase().includes(initialText.toLowerCase())) 
  {
    button1.innerHTML =
      '<span>Time Out</span>';
  } 
  else
    button1.textContent = initialText;
    
  index = index >= colors.length - 1 ? 0 : index + 1;

});