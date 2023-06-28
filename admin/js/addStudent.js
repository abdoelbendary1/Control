$(document).ready(function () {
  let addForm = {
    ref: $("#addStudentFormDiv"),
    btn_openAddStudentForm: $("#openAddFormButton"),
    btn_closeAddStudentForm: $("#closeAddFormButton"),
    nameField: $("#addName"),
    passField: $("#addpassword"),
    genderField: $("#addGender"),
    emailField: $("#addEmail"),
    datebirthField: $("#add-DOB"),
    phoneNumField: $("#add-phone-num"),
    ruleField: $("#addRule"),
    imageField: $("#student-image"),
    btn_save: $("#saveStudent"),
    errors: [],
    error_id: $("#nameExists"),
    error: $("#addError"),
  };

  let updateForm = {
    ref: $("#updateStudentFormDiv"),
    btn_closeUpdateStudentForm: $("#closeUpdateFormButton"),
    nameField: $("#updateName"),
    passField: $("#updatepassword"),
    genderField: $("#updateGender"),
    emailField: $("#updateEmail"),
    datebirthField: $("#update-add-DOB"),
    phoneNumField: $("#update-add-phone-num"),
    ruleField: $("#update-Rule"),
    imageField: $("#update-student-image"),
    btn_update: $("#updateStudent"),
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
    "datebirthField",
    "phoneNumField",
    "imageField",
    "ruleField",
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
        <td>${data["datebirth"]}</td>
        <td>${data["phoneNum"]}</td>
        <td>${data["rule"]}</td>

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
    add: function (anyArray, anyForm, studentObject) {
      if (
        validation.nameExists(anyArray, anyForm) ||
        anyForm.nameField.val() == "" ||
        anyForm.passField.val() == "" ||
        anyForm.genderField.val() == "" ||
        anyForm.emailField.val() == "" ||
        anyForm.datebirthField.val() == "" ||
        anyForm.phoneNumField.val() == "" ||
        anyForm.ruleField.val() == "" ||
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
    update: function (anyArray, anyForm, currentIndex, studentObject) {
      if (currentIndex in anyArray) {
        anyArray[currentIndex] = studentObject;
      }
    },
  };

  let output = $("tbody");
  let studentsInfo = [];

  let newStudent;
  let updatedStudent;

  /* 
  ----------------
  SAVE MECHANISM 
  ----------------
  */

  // Add Form -> Save Button -> [Get Values from Add Form] [Add to Object] and [Display in DOM]
  addForm.btn_save.click(function () {
    newStudent = {
      name: addForm.nameField.val(),
      pass: addForm.passField.val(),
      gender: addForm.genderField.val(),
      email: addForm.emailField.val(),
      datebirth: addForm.datebirthField.val(),
      phoneNum: addForm.phoneNumField.val(),
      rule: addForm.ruleField.val(),
      image: addForm.imageField.val(),
    };
    crud.add(studentsInfo, addForm, newStudent);
    interaction.display(output, studentsInfo);
  });

  // Creating un-assigned variable for getting the index of the row for which edit icon is clicked
  let updateIndex;

  /* 
  ----------------
  UPDATE MECHANISM 
  ----------------
  */

  // Table -> Edit Icon -> [Find updateIndex in studentsInfo] [Display Update Form with Pre-filled Matching Information]
  output.on("click", "i.editRowButton", function () {
    updateIndex = $("i.editRowButton").index(this);
    if (updateIndex in studentsInfo) {
      interaction.open(updateForm.ref);

      updateForm.ref
        .find(updateForm.nameField)
        .val(studentsInfo[updateIndex]["name"]);
      updateForm.ref
        .find(updateForm.passField)
        .val(studentsInfo[updateIndex]["pass"]);
      updateForm.ref
        .find(updateForm.genderField)
        .val(studentsInfo[updateIndex]["gender"]);
      updateForm.ref
        .find(updateForm.emailField)
        .val(studentsInfo[updateIndex]["email"]);
      updateForm.ref
        .find(updateForm.datebirthField)
        .val(studentsInfo[updateIndex]["datebirth"]);
      updateForm.ref
        .find(updateForm.phoneNumField)
        .val(studentsInfo[updateIndex]["phoneNum"]);
      updateForm.ref
        .find(updateForm.ruleField)
        .val(studentsInfo[updateIndex]["rule"]);
      updateForm.ref
        .find(updateForm.imageField)
        .val(studentsInfo[updateIndex]["image"]);
    }

    interaction.display(output, studentsInfo);
  });

  // Update Form -> Save button -> [Get values from Update Form] [Update matching student in the studentsInfo] [Display updated Info in DOM]
  updateForm.btn_update.click(function () {
    updatedStudent = {
      name: updateForm.nameField.val(),
      pass: updateForm.passField.val(),
      gender: updateForm.genderField.val(),
      email: updateForm.emailField.val(),
      datebirth: updateForm.datebirthField.val(),
      phoneNum: updateForm.phoneNumField.val(),
      rule: updateForm.ruleField.val(),
      image: updateForm.imageField.val(),
    };
    crud.update(studentsInfo, addForm, updateIndex, updatedStudent);
    interaction.display(output, studentsInfo);
  });

  /* 
  ----------------
  DELETE MECHANISM 
  ----------------
  */

  // // Table -> Delete Icon -> Delete Matching Object from studentsInfo
  // output.on('click', 'i.deleteRowButton', function() {
  //   let index = $( "i.deleteRowButton" ).index( this );
  //   if( index in studentsInfo ) {
  //     studentsInfo.splice(index,1);
  //   }
  //   interaction.display(output, studentsInfo);
  // })

  // INTERACTIONS

  // Main Button -> Open Add Student Form
  addForm.btn_openAddStudentForm.click(function () {
    interaction.open(addForm.ref);
  });

  // Cross Button -> Close Add Student Form
  addForm.btn_closeAddStudentForm.click(function () {
    interaction.close(addForm.ref);
  });

  // Close Button -> Close Update Student Form
  updateForm.btn_closeUpdateStudentForm.click(function () {
    interaction.close(updateForm.ref);
  });

  // Add Form Id Input -> Runtime Check for Existing Id
  addForm.emailField.keyup(function () {
    validation.validateId(studentsInfo, addForm);
  });

  // Update Form Id Input -> Runtime check for Existing Id
  updateForm.emailField.keyup(function () {
    validation.validateId(studentsInfo, updateForm);
  });
});

// search bar
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("addStudents");
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
