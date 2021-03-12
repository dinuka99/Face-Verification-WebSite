const countryListSelect = document.querySelector("#country");

countryListSelect.addEventListener("change", function () {
  const selectedCountryCode = (countryListSelect.value);

  // disablalling all form feilds temporarily 
  $("#paymentAccountForm :input, #paymentAccountForm select, #paymentAccountForm textarea").prop('disabled', true);

  // Fetching bank list for selected country
  fetch(`https://informationconsultancyservices.co.uk/crowd/new-design/bank-list.php?country=${selectedCountryCode}`)
    .then(response => response.json())
    .then(jsonResult => {
      const bankNameFieldOld = document.querySelector("#account_bank_name");
      const bankISOCodeInput = document.querySelector("#account_bank_code");

      // enabling form fields after fetch (on success)
      $("#paymentAccountForm :input, #paymentAccountForm select, #paymentAccountForm textarea").prop('disabled', false);
      const { status, data } = jsonResult;

      if (status === "success") {
        // first Change bankNameFieldOld into a select 
        const bankNameFieldNew = document.createElement("select");
        bankNameFieldNew.name = "account_bank_name";
        bankNameFieldNew.id = "account_bank_name";
        bankNameFieldNew.classList.add("form-control");
        $.each(data, function (index, bankInfo) {
          $(bankNameFieldNew).append($('<option>', {
            value: bankInfo.name,
            text: bankInfo.name,
            "data-bank-code": bankInfo.code,
          }));
        });

        // replacing bankNameFieldOld with bankNameFieldNew
        bankNameFieldOld.replaceWith(bankNameFieldNew);

        // make bankISOCodeInput readonly
        $(bankISOCodeInput).prop("readonly", true);
        bankISOCodeInput.value = "";

        // add event listener to set correct bank code on bank name change
        bankNameFieldNew.addEventListener("change", function () {
          setBankCode(bankNameFieldNew, bankISOCodeInput);
        })
      } else {
        /* if api couldn't get banks for chosen country */
        // change bankNameFieldOld into an input
        const bankNameFieldNew = document.createElement("input");
        bankNameFieldNew.name = "account_bank_name";
        bankNameFieldNew.id = "account_bank_name";
        bankNameFieldNew.classList.add("form-control");

        // replacing bankNameFieldOld with bankNameFieldNew
        bankNameFieldOld.replaceWith(bankNameFieldNew);

        // make bankISOCodeInput writable
        $(bankISOCodeInput).prop("readonly", false);
        bankISOCodeInput.value = "";
      }
    })
    .catch(err => {
      // enabling form fields after fetch (on error)
      $("#paymentAccountForm :input, #paymentAccountForm select, #paymentAccountForm textarea").prop('disabled', false);
      console.log(err)
    })
})

// function to set Bamk Code field value on bank name field change
function setBankCode(bankNameFieldSelect, bankISOCodeInput) {
  const selectedOption = bankNameFieldSelect.options[bankNameFieldSelect.selectedIndex];
  const selectedBankCode = selectedOption.dataset.bankCode;
  bankISOCodeInput.value = selectedBankCode;
}