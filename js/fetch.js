window.addEventListener("DOMContentLoaded", function() {
  let countryCode = country.options[country.selectedIndex].value;
  console.log(countryCode)

  if (countryCode) {
    fetchBanksByCountry(countryCode)
  }

  if (!window.alreadyHasAccount) {
    country.addEventListener("change", function(event) {
      let countryCode = country.options[country.selectedIndex].value;
      console.log(countryCode);

      fetchBanksByCountry(countryCode)
    })
  }
})

function fetchBanksByCountry(countryCode) {
  fetch(`get-banks.php?cc=${countryCode}`)
    .then(res => res.json())
    .then(json => {
      if (json.status && json.status == "success") {
        if (window.account_bank_code) {
          account_bank_code.closest('div').style.display = "none";
        }

        const banks = json.data;

        let options = "";
        banks.forEach(bankInfo => {
          options += `<option value="${bankInfo.code}" ${(window.selectedBankCode == bankInfo.code && window.selectedCountry == countryCode) ? "selected" : ""}>${bankInfo.name}</option>`
        })

        const banksSelect = document.createElement("select");
        banksSelect.id = "account_bank";
        banksSelect.name = "account_bank";
        banksSelect.className = "form-control";
        banksSelect.required = true;
        banksSelect.innerHTML = options;
        if (window.alreadyHasAccount) {
          banksSelect.disabled = true;
        }

        if (window.account_bank_name) {
          account_bank_name.replaceWith(banksSelect)
        } else if (window.account_bank) {
          account_bank.replaceWith(banksSelect)
        }
      } else {
        if (window.account_bank_code) {
          account_bank_code.closest('div').style.display = "block";
        }

        const banksInput = document.createElement('input');
        banksInput.className = "form-control";
        banksInput.name = "account_bank_name";
        banksInput.id = "account_bank_name"
        banksInput.required = true;

        if (window.account_bank) {
          account_bank.replaceWith(banksInput)
        }
      }
    })
    .catch(console.log)
}
