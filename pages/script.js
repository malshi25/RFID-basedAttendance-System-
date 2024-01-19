//Registration Form

function submitForm(event) {
    event.preventDefault(); // Prevent form submission
    
  
    // Get form values
    var fname = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var idnum = document.getElementById("idnum").value;
    var phone = document.getElementById("phone").value;
  
    // Perform form validation
    if (fname === "" || email === "" || idnum === "" || phone === "" ) {
      alert("Please fill in all fields");
      return;
    }
  

  // Check if the password is incorrect
  if (password !== "cpassword") {
    var cpassword = prompt("Incorrect password. Please enter the correct password:");

    // Check if the corrected password is empty or null
    if (cpassword === "" || cpassword === null) {
      return; // Cancel form submission
    }

    // Update the password field with the corrected password
    document.getElementById("password").value = cpassword;
  }

    // Submit the form to the server (you can add AJAX code here to send the form data to the server)
  
    // Reset the form after submission
    document.getElementById("register-form").reset();
  }



  function submitForm(event) {
    event.preventDefault();


  document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    // Perform your login logic here
    // Example: You can check if the username and password match a predefined set of credentials
  
    if (username === "" && password === "password") {
      alert("Login successful!");
      // Redirect to another page or perform other actions
    } else {
      alert("Invalid username or password. Please try again.");
    }
  });
  
}


const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})




 

window.addEventListener('DOMContentLoaded', event => {

  // Navbar shrink function
  var navbarShrink = function () {
      const navbarCollapsible = document.body.querySelector('#mainNav');
      if (!navbarCollapsible) {
          return;
      }
      if (window.scrollY === 0) {
          navbarCollapsible.classList.remove('navbar-shrink')
      } else {
          navbarCollapsible.classList.add('navbar-shrink')
      }

  };

  // Shrink the navbar 
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener('scroll', navbarShrink);

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector('#mainNav');
  if (mainNav) {
      new bootstrap.ScrollSpy(document.body, {
          target: '#mainNav',
          rootMargin: '0px 0px -40%',
      });
  };

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector('.navbar-toggler');
  const responsiveNavItems = [].slice.call(
      document.querySelectorAll('#navbarResponsive .nav-link')
  );
  responsiveNavItems.map(function (responsiveNavItem) {
      responsiveNavItem.addEventListener('click', () => {
          if (window.getComputedStyle(navbarToggler).display !== 'none') {
              navbarToggler.click();
          }
      });
  });

  // Activate SimpleLightbox plugin for portfolio items
  new SimpleLightbox({
      elements: '#portfolio a.portfolio-box'
  });

});



$(document).ready(function() {
  $('button[type="submit"]').click(function(e) {
      e.preventDefault();
      $('.alert').removeClass("hide");
      $('.alert').addClass("show");
      $('#register-form').submit();
  });

  $('.xmark').click(function() {
      $('.alert').addClass("hide");
      $('.alert').removeClass("show");
  });
});




