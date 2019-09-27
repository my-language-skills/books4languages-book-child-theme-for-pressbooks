/**
 * Script for handling of opening translation dropdowns.
 *
 * SINCE v1.3
 */
function mls_toggleLangDropdown(event, dropDownName) {
    //Pass in your dropdownName which is the dropdown
    var dropDownHandler = document.getElementById(dropDownName);

    dropDownHandler.classList.toggle("show-dropdown");
    // Get the trigger element of the dropdown
    var menuHandler = event.currentTarget;

    if (dropDownHandler.classList.contains("show-dropdown")) {
      //Attach only when the dropdown is active,
      //to ensure onclick isn't called always
      document.addEventListener("click", function(docEvent) {
        documentHandler(docEvent, menuHandler)
      });
    } else {
      dropDownHandler.classList.toggle("show-dropdown");
      // If is closed, remove the handler
      document.removeEventListener("click", documentHandler);
    }

    function documentHandler(event, menuHandler) {
      if (menuHandler.contains(event.target)) {
        dropDownHandler.classList.add("show-dropdown");
      } else {
        dropDownHandler.classList.remove("show-dropdown");
      }
    }
  }
/** End of added script */

/**
 * Script for handling of opening relation dropdowns.
 *
 * SINCE v1.4
 */
function mls_toggleRelationDropdowns(event, dropDownName, locationCase) {
    //Pass in your dropdownName which is the dropdown
    var dropDownHandler = document.getElementById(dropDownName);

    if(locationCase == "book-info"){
      var dropDownClass = "dropdown-relations-content-bookinfo";
    } else if (locationCase == "chapter") {
      var dropDownClass = "dropdown-relations-content-chapters";
    }
      dropDownHandler.classList.toggle(dropDownName);
      // Get the trigger element of the dropdown
      var menuHandler = event.currentTarget;

      if (dropDownHandler.classList.contains(dropDownName)) {
        //Attach only when the dropdown is active,
        //to ensure onclick isn't called always
        document.addEventListener("click", function(docEvent) {
          documentHandler(docEvent, menuHandler)
        });
      } else {
        dropDownHandler.classList.toggle(dropDownName);
        // If is closed, remove the handler
        document.removeEventListener("click", documentHandler);
      }

      function documentHandler(event, menuHandler) {
        if (menuHandler.contains(event.target)) {
          dropDownHandler.classList.add(dropDownClass, dropDownName );
        } else {
          dropDownHandler.classList.remove(dropDownClass, dropDownName );
        }
      }
  }
  /** End of added script */
