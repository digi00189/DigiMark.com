let availableKeywords = [
  'My Store',
  'Analytics',
  'Team',
  'Feed Back',
  'Settings',
  'Logout',
  'Upgrade to pro for more features',
  'New Viewers',
  'Purchasers',
  'Total Earnings',
  'withdrawal',
  'update profile',
  'user',
  'date of order',
  'status',
  'todos',
  'help',
  'info',
  'profile',
  'notification',
  'referral link',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
  let result = [];
  let input = inputBox.value;
  if(input.length){
    result = availableKeywords.filter((keyword)=>{
        return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  display(result);

  if(!result.length){
    resultsBox.innerHTML = '';
  }
}

function display(result){
  const content = result.map((list)=>{
    return "<li onclick=selectInput(this)>" + list + "</li>";
  });
  
  resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";

}

function selectInput(list){
  inputBox.value = list.innerHTML;
  resultsBox.innerHTML = '';
}