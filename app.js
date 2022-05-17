const charactersList = document.getElementById('charactersList');
const searchBar = document.getElementById('searchBar');
let hpCharacters = [];
let strings = "";


var request = new XMLHttpRequest();
request.open("GET","getusers.php", true);
request.send();

request.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
		hpCharacters = JSON.parse(this.responseText);
        console.log(hpCharacters);
	}
}

searchBar.addEventListener('keyup', (e) => {
    let searchString = e.target.value.toLowerCase();
	strings = e.target.value.toLowerCase();
    let filteredCharacters = hpCharacters.filter((character) => {
        return (
			character["username"].toLowerCase().includes(searchString)
        );
    });
    if(strings === ""){
		filteredCharacters = [];
    }
    displayCharacters(filteredCharacters);
});


const displayCharacters = (characters) => {
    const htmlString = characters
        .map((character) => {
            return `
            <li class="character" style="position: sticky; width: 75%;">
                <a href="../user/${character['username']}"><button style="text-align: center;">${character["username"]}</button></a>
            </li>
        `;
        })
        .join('');
    charactersList.innerHTML = htmlString;
};
