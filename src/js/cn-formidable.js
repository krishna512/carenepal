jQuery(function ($) {
  const formidableInput =
    '.frm_forms input[type="text"]:not(".frm_verify"), .frm_forms input[type="email"], .frm_forms input[type="tel"], .frm_forms textarea, .frm_forms input[type="radio"], .frm_forms input[type="checkbox"], .frm_forms select';

  let vacancyData = {};

  if (localStorage.vacancyData != undefined) {
    vacancyData = JSON.parse(localStorage.vacancyData);
  } else {
    // steps:
    const steps = $('.frm_page_bar input');

    //loop through steps and create a starting object
    steps.each(function () {
      const text = $(this).parent().find('.frm_rootline_title').text();
      if (text) {
        Object.assign(vacancyData, { [text]: {} });
      }
    });
  }

  var formData = {
    set: function ($this) {
      /**
       * ==================================================
       * Set local storage variable on content change
       * ==================================================
       * new concept
       */

      //step 1 - detect active step
      const activeStep = $('.frm_page_bar .frm_current_page'),
        activeTitle = activeStep.find('.frm_rootline_title').text(),
        name = $this.attr('name'),
        value = $this.val();

      Object.assign(vacancyData[activeTitle], { [name]: value });

      localStorage.vacancyData = JSON.stringify(vacancyData);
    },

    get: function () {
      if (localStorage.vacancyData != undefined) {
        //json parse
        vacancyData = JSON.parse(localStorage.vacancyData);

        //get active steps
        const activeStep = $('.frm_page_bar .frm_current_page'),
          activeTitle = activeStep.find('.frm_rootline_title').text();

        const currentData = vacancyData[activeTitle];

        for (const prop in currentData) {
          const name = prop,
            value = currentData[prop],
            target = $('[name="' + name + '"]');

          if (target.is(':radio')) {
            $('[value="' + value + '"]').prop('checked', true);
          } else {
            $('[name="' + name + '"]').val(value);
          }
        }
      }
    },
  };

  formData.get();

  if (formidableInput.length > 0) {
    $(document).on('change', formidableInput, function () {
      formData.set($(this));
    });
  }

  // show other field

  const selectField = $('.frm_forms select');

  if (selectField.length > 0) {
    selectField.each(function () {
      const val = $(this).val();

      if (val === 'Others (please mention)') {
        $(this).parent().find('.frm_other_input').removeClass('frm_pos_none');
      }
    });
  }
});
