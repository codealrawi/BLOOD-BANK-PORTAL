document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('countrySelect');
    const clickArea = document.getElementById('clickArea'); // Reference to the clickable area
    const userScoreElement = document.getElementById('userScore');
    const countryScoresList = document.getElementById('countryScores');
    let userScore = 0;

    // Fetch countries from the server and populate the dropdown.
    fetch('get_countries.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.id;
                option.textContent = country.name;
                countrySelect.appendChild(option);
            });
        });

    // Function to start the game.
    function startGame(countryId) {
        // Send the selected country to the server to track the user's clicks.
        fetch('track_click.php', {
            method: 'POST',
            body: JSON.stringify({ countryId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            userScore += data.clicks;
            userScoreElement.textContent = userScore;
        })
        .catch(error => console.error('Error:', error));
    }

     // Function to update the dashboard with country scores.
     function updateDashboard() {
        fetch('get_country_scores.php')
            .then(response => response.json())
            .then(data => {
                countryScoresList.innerHTML = '';
                data.forEach((country, index) => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${country.name}: ${country.score}`;
                    if (index < 3) {
                        // Apply bold styling to the top 3 countries.
                        listItem.style.fontWeight = 'bold';
                    }
                    countryScoresList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    // Update the dashboard every 5 seconds.
    setInterval(updateDashboard, 5000);

    // Add a click event listener to the clickable area.
    clickArea.addEventListener('click', function () {
        const selectedCountryId = countrySelect.value;

        // Increment the user's score when clicking inside the clickable area.
        startGame(selectedCountryId);
    });
});
