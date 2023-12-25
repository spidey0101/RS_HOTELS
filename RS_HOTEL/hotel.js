// JavaScript for showing/hiding the reviews section when "About Us" button is clicked

document.getElementById('about-us-btn').addEventListener('click', function() {
    document.getElementById('review-dialog').style.display = 'block';
  });
  
  document.getElementById('close-dialog-btn').addEventListener('click', function() {
    document.getElementById('review-dialog').style.display = 'none';
  });
  