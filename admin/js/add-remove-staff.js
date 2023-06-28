$(document).ready(function () {
  /* 
    ----------------
    DEFINTING FORMS
    ----------------
    */

  let addForm = {
    ref: $("#addStaffFormDiv"),
    btn_openAddStaffForm: $("#openAddFormButton"),
    btn_closeAddStaffForm: $("#closeAddFormButton"),
    nameField: $("#addName"),
    passField: $("#addpassword"),
    genderField: $("#addGender"),
    emailField: $("#addEmail"),
    positionField: $("#addPosition"),
    datebirthField: $("#add-DOB"),
    phoneNumField: $("#add-phone-num"),
    imageField: $("#Staff-image"),
    btn_save: $("#saveStaff"),
    errors: [],
    error_id: $("#nameExists"),
    error: $("#addError"),
  };

  let updateForm = {
    ref: $("#updateStaffFormDiv"),
    btn_closeUpdateStaffForm: $("#closeUpdateFormButton"),
    nameField: $("#updateName"),
    passField: $("#updatepassword"),
    genderField: $("#updateGender"),
    emailField: $("#updateEmail"),
    positionField: $("#updatePosition"),
    datebirthField: $("#update-add-DOB"),
    phoneNumField: $("#update-add-phone-num"),
    imageField: $("#update-Staff-image"),
    btn_update: $("#updateStaff"),
    errors: [],
    error_id: $("#updateNameExists"),
    error: $("#updateError"),
  };

  /* 
  ----------------
  ----------------
  */

  let validation = {
    nameExists: function (anyArray, formName) {
      for (let i in anyArray) {
        if (anyArray[i]["email"] === formName.emailField.val()) {
          return true;
        }
      }
    },
    validateId: function (anyArray, formName) {
      for (let i in anyArray) {
        if (anyArray[i]["email"] === formName.emailField.val()) {
          interaction.open(formName.error_id);
          formName.error_id.text(
            `${anyArray[i]["email"]} has already been assigned to ${anyArray[i]["name"]}`
          );
        } else {
          interaction.close(formName.error_id);
        }
      }
    },
    emptyField: function (formName, [...fieldNames]) {
      console.log(fieldNames);
      fieldNames.forEach(function (field) {
        if (formName[field].val() === "" || formName[field].val() == null) {
          formName.errors = "";
          formName.errors = `Please specify ${formName[field].attr(
            "name"
          )} field`;
          console.log(formName.errors);
          interaction.open(formName.error);
          formName.error.append(`<li>${formName.errors}</li>`);
          console.log(formName.error.html());
        }
      });
    },
  };
  fieldsToValidate = [
    "nameField",
    "passField",
    "genderField",
    "emailField",
    "positionField",
    "datebirthField",
    "phoneNumField",
    "imageField",
  ];

  /* 
    ---------------------
    DEFINING INTERACTIONS 
    ---------------------
    */

  let interaction = {
    open: function (anyEle) {
      anyEle.slideDown();
    },
    close: function (anyEle) {
      anyEle.slideUp();
    },
    display: function (anyHTMLElement, anyArray) {
      anyHTMLElement.html("");
      $(anyArray).each(function (index, value) {
        data = value;

        anyHTMLElement.append(`<tr>
          <td>${data["name"]}</td>
          <td>${data["pass"]}</td>
          <td>${data["gender"]}</td>
          <td>${data["email"]}</td>
          <td>${data["position"]}</td>
          <td>${data["datebirth"]}</td>
          <td>${data["phoneNum"]}</td>
        

          <td>
          <i class='material-icons editRowButton' id='edit${data["id"]}'><i class="fa-solid fa-pen-to-square" ></i></i>
          
          <i class='material-icons deleteRowButton' id='delete${data["id"]}'><i class="fa-solid fa-trash-can"></i></i>
          </td>
          
          </tr>`);
      });
    },
  };

  /* 
    -------------------------
    DEFINING CRUD OPERATIONS 
    -------------------------
    */

  let crud = {
    add: function (anyArray, anyForm, StaffObject) {
      if (
        validation.nameExists(anyArray, anyForm) ||
        anyForm.nameField.val() == "" ||
        anyForm.passField.val() == "" ||
        anyForm.genderField.val() == "" ||
        anyForm.emailField.val() == "" ||
        anyForm.positionField.val() == "" ||
        anyForm.datebirthField.val() == "" ||
        anyForm.phoneNumField.val() == "" ||
        anyForm.imageField.val() == ""
      ) {
        validation.validateId(anyArray, anyForm);
        validation.emptyField(anyForm, fieldsToValidate);
      } else {
        anyForm.errors = [];
        interaction.close(anyForm.error);
        /*
        ------------------
        // NOTE //
        ------------------
        */
        /*here how we add student object to the table i already disable it to let the backend add this pbject
        but note that the update form will not work becouse its connect to (anyarray) function that should be
         add upon student object that we already disable   */

        /////////// anyArray.push(studentObject); ////////////////
      }
    },
    update: function (anyArray, anyForm, currentIndex, StaffObject) {
      if (currentIndex in anyArray) {
        anyArray[currentIndex] = StaffObject;
      }
    },
  };

  let output = $("tbody");
  let StaffInfo = [];

  let newStaff;
  let updatedStaff;

  /* 
    =========================
    CRUD OPERATIONS IN ACTION 
    =========================
    */

  /* 
    ----------------
    SAVE MECHANISM 
    ----------------
    */

  // Add Form -> Save Button -> [Get Values from Add Form] [Add to Object] and [Display in DOM]
  addForm.btn_save.click(function () {
    newStaff = {
      name: addForm.nameField.val(),
      pass: addForm.passField.val(),
      gender: addForm.genderField.val(),
      email: addForm.emailField.val(),
      position: addForm.positionField.val(),
      datebirth: addForm.datebirthField.val(),
      phoneNum: addForm.phoneNumField.val(),
      image: addForm.imageField.val(),
    };
    crud.add(StaffInfo, addForm, newStaff);
    interaction.display(output, StaffInfo);
  });

  // Creating un-assigned variable for getting the index of the row for which edit icon is clicked
  let updateIndex;

  /* 
    ----------------
    UPDATE MECHANISM 
    ----------------
    */

  // Table -> Edit Icon -> [Find updateIndex in StaffInfo] [Display Update Form with Pre-filled Matching Information]
  output.on("click", "i.editRowButton", function () {
    updateIndex = $("i.editRowButton").index(this);
    if (updateIndex in StaffInfo) {
      interaction.open(updateForm.ref);

      updateForm.ref
        .find(updateForm.nameField)
        .val(StaffInfo[updateIndex]["name"]);
      updateForm.ref
        .find(updateForm.passField)
        .val(StaffInfo[updateIndex]["pass"]);
      updateForm.ref
        .find(updateForm.genderField)
        .val(StaffInfo[updateIndex]["gender"]);
      updateForm.ref
        .find(updateForm.emailField)
        .val(StaffInfo[updateIndex]["email"]);
      updateForm.ref
        .find(updateForm.positionField)
        .val(StaffInfo[updateIndex]["position"]);
      updateForm.ref
        .find(updateForm.datebirthField)
        .val(StaffInfo[updateIndex]["datebirth"]);
      updateForm.ref
        .find(updateForm.phoneNumField)
        .val(StaffInfo[updateIndex]["phoneNum"]);
      updateForm.ref
        .find(updateForm.imageField)
        .val(StaffInfo[updateIndex]["image"]);
    }

    interaction.display(output, StaffInfo);
  });

  // Update Form -> Save button -> [Get values from Update Form] [Update matching Staff in the StaffInfo] [Display updated Info in DOM]
  updateForm.btn_update.click(function () {
    updatedStaff = {
      name: updateForm.nameField.val(),
      pass: updateForm.passField.val(),
      gender: updateForm.genderField.val(),
      email: updateForm.emailField.val(),
      position: updateForm.positionField.val(),
      datebirth: updateForm.datebirthField.val(),
      phoneNum: updateForm.phoneNumField.val(),
      image: updateForm.imageField.val(),
    };
    crud.update(StaffInfo, addForm, updateIndex, updatedStaff);
    interaction.display(output, StaffInfo);
  });

  /* 
    ----------------
    DELETE MECHANISM 
    ----------------
    */


  // INTERACTIONS

  // Main Button -> Open Add Staff Form
  addForm.btn_openAddStaffForm.click(function () {
    interaction.open(addForm.ref);
  });

  // Cross Button -> Close Add Staff Form
  addForm.btn_closeAddStaffForm.click(function () {
    interaction.close(addForm.ref);
  });

  // Close Button -> Close Update Staff Form
  updateForm.btn_closeUpdateStaffForm.click(function () {
    interaction.close(updateForm.ref);
  });

  // Add Form Id Input -> Runtime Check for Existing Id
  addForm.emailField.keyup(function () {
    validation.validateId(StaffInfo, addForm);
  });

  // Update Form Id Input -> Runtime check for Existing Id
  updateForm.emailField.keyup(function () {
    validation.validateId(StaffInfo, updateForm);
  });
});

// search bar
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("addStaff");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
