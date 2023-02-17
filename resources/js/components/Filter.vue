<template>
  <div
    id="filter"
    class="filter-wrapper"
    @submit.prevent="sendRequest"
  >
    <form class="form">
      <div class="form-item">
        <h5>Search</h5>
        <input
          v-model="searchText"
          class="input"
          type="text"
          name="last_name"
          placeholder="Enter last name"
        >
      </div>
      <div class="form-item">
        <h5>Department</h5>
        <select
          v-model="selectedDepartment"
          name="department"
          class="input select"
        >
          <option
            selected
            value=""
          />
          <option
            v-for="department in departments"
            :value="department.id"
          >
            {{ department.name }}
          </option>
        </select>
      </div>

      <div class="form-item">
        <div class="form-item__title">
          <h5>Skills</h5>
          <input
            class="span"
            type="button"
            value="Clear"
            @click="deleteSelect"
          >
        </div>

        <div class="multiselect_block">
          <label
            id="select-skills-label"
            class="field_multiselect"
          >
            <button
              class="add"
              type="button"
            >+</button>
          </label>

          <input
            id="checkbox-1"
            class="multiselect_checkbox"
            type="checkbox"
            style="display: none;"
          >
          <label
            for="checkbox-1"
            class="multiselect_label select"
          />

          <select
            id="select-skills"
            class="field_select"
            name="skills[]"
            multiple
          >
            <option
              v-for="skill in skills"
              :value="skill.id"
            >
              {{ skill.name }}
            </option>
          </select>
        </div>
      </div>

      <div class="form-item">
        <div class="form-item__title">
          <h5>Foreign Languages</h5>
          <input
            class="span"
            onclick=""
            type="button"
            value="Clear"
          >
        </div>
        <input
          v-model="languageText"
          class="input"
          type="text"
          name=""
        >
      </div>
      <button class="form-item controls-item fill">
        <svg
          width="18"
          height="18"
          viewBox="0 0 18 18"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M16 8C16 11.3137 13.3137 14 10 14C6.68629 14 4 11.3137 4 8C4 4.68629 6.68629 2 10 2C13.3137 2 16 4.68629 16 8ZM18 8C18 12.4183 14.4183 16 10 16C8.15129 16 6.44904 15.3729 5.09436 14.3199L1.70711 17.7071C1.31658 18.0976 0.683418 18.0976 0.292893 17.7071C-0.0976309 17.3166 -0.0976309 16.6834 0.292893 16.2929L3.68014 12.9056C2.62708 11.551 2 9.84871 2 8C2 3.58172 5.58172 0 10 0C14.4183 0 18 3.58172 18 8Z"
          />
        </svg>
      </button>
    </form>
  </div>
</template>

<script type="text/javascript">

export default {
  name: 'Filter',

  props: {
    skills: {
      required: true,
    },
    departments: {
      required: true,
    },
  },
  data() {
    return {
      selectedDepartment: '',
      selectedSkills: [],
      searchText: '',
      languageText: '',
    };
  },
  mounted() {
    this.main();
  },

  methods: {
    sendRequest() {
      this.selectedSkills = [];
      let select = document.getElementById('select-skills');
      let options = select.getElementsByTagName('option');
      for(let index in options) {
        let option = options[index];
        if(option.selected)
          this.selectedSkills.push(option.value);
      }

      let params = {};
      if(this.searchText)
        params.search = this.searchText;
      if(this.selectedDepartment)
        params.department = this.selectedDepartment;
      if(this.selectedSkills)
        params.skills = this.selectedSkills;
      if(this.languageText)
        params.language = this.languageText;
      this.$parent.getResumes(params);
    },

    myFunction() {
      var x = document.getElementById('filter');
      x.style.display = x.style.display === 'none' ? 'block' : 'none';
    },

    toggle(button) {
      var x = button.parentNode.nextElementSibling;
      var path = button.childNodes[1].childNodes[1];
      path.setAttribute('d', (x.classList.toggle('magic')) ? 'M9 1L5 5L1 1' : 'M1 5L5 1L9 5');
      x.style.display = x.style.display === 'none' ? 'flex' : 'none';
    },

    hideSkills(skillsWrapper) {
      let limit = 5;
      if (typeof skillsWrapper !== 'undefined') {
        let skills = skillsWrapper.find('.tech-item');
        skills.each(function (index) {
          if (index >= limit) {
            $(this).hide();
          }
        });
        skillsWrapper.addClass('limited');
      } else {
        let skillsWrappers = $('.skills');
        skillsWrappers.each(function () {
          let skills = $(this).find('.tech-item');
          if (skills.length > limit) {
            $(this)
              .addClass('limited')
              .find('.view-all')
              .show();
          }
          skills.each(function (index) {
            if (index >= limit) {
              $(this).hide();
            }
          });
        });
      }
    },

    showSkills(skillsWrapper) {
      if (typeof skillsWrapper !== 'undefined') {
        let skills = skillsWrapper.find('.tech-item');
        skills.each(function () {
          $(this).show();
        });
        skillsWrapper.removeClass('limited');
      }
    },


    addButton(label, classes, textContent) {
      let button = document.createElement('button');
      button.type = 'button';
      button.className = classes;
      button.textContent = textContent;
      button.type = 'button';
      label.append(button);
    },

    deleteSelect() {
      var select = document.getElementById('select-skills');
      var label = document.getElementById('select-skills-label');
      var skills = label.getElementsByClassName('option');

      if (skills.length > 0) {
        do {
          skills[0].remove();
        } while (skills.length > 0);

        select.selectedOptions.remove;
      }
    },

    main() {
      const that = this;
      let multiselect_block = document.querySelectorAll('.multiselect_block');
      multiselect_block.forEach(parent => {
        let label = parent.querySelector('.field_multiselect');
        let select = parent.querySelector('.field_select');
        select.addEventListener('change', function (element) {
          let selectedOptions = this.selectedOptions;
          label.innerHTML = '';
          for (let option of selectedOptions) {
            that.addButton(label, 'option', option.textContent);
          }
          that.addButton(label, 'add', '+');
        });
      });
    },
  },
  render() {
    return this.addButton();
  },
};
</script>


<style lang="scss" scoped>
$body-bg: #f8fafc;
$black: #191B1D;
$blue: #307bc6;
$gray: #D9D9D9;
$purple: #6A5EFF;

.filter-wrapper {
    margin-bottom: 38px;

    .form {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: flex-end;
        row-gap: 16px;
        column-gap: 16px;


        .controls-item {
            display: flex;
            align-items: center;
            justify-content: center;
            column-gap: 15px;
            padding: 15px;
            cursor: pointer;
            background-color: #FFFFFF;
            border: 1px $gray solid;

            span {
                font-family: 'Sora', sans-serif;
                font-size: 16px;
                font-weight: 400;
            }

            &.stroke > svg > path {
                stroke: $black;
            }

            &.fill > svg > path {
                fill: $black;
            }
        }

        .form-item {
            max-width: 407px;
            width: 100%;

            .form-item__title {
                display: flex;
                align-items: center;

                h5 {
                    margin: 0 8px 4px 0;
                }

                .span {
                    border: 0;
                    background: transparent;
                    font: 14px 'Karla', sans-serif;
                    font-weight: 300;
                    color: $purple;

                    &:hover {
                        cursor: pointer;
                        color: $blue;
                    }
                }
            }

            .multiselect_block {
                position: relative;
                width: 100%;

                .field_multiselect {
                    padding: 8px 60px 10px 16px;
                    position: relative;
                    width: 100%;
                    display: block;
                    max-height: 48px;
                    border: 1px solid $gray;
                    box-sizing: border-box;
                    font-size: 8px;
                    color: #a8acc9;

                    outline-color: #cdd6f3;

                    &:hover {
                        box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
                    }

                    &:focus {
                        box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
                    }


                    button {
                        font-size: 16px;
                        color: #191B1D;
                        position: relative;
                        padding: 0 14px;
                        border: 0;
                        background: #D9D9D9;
                        border-radius: 100px;
                        margin: 4px 8px 0 0;
                        max-height: 28px;
                        text-align: center;

                        &.option {
                            background-color: red;
                        }

                        &.add {
                            background-color: #FFFFFF;
                            border: 1px solid #D9D9D9;
                        }
                    }

                    span {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        font: 16px 'Karla', sans-serif;
                        font-weight: 400;
                        color: #D9D9D9;
                    }

                }

                .multiselect_checkbox {
                    &:checked ~ .field_select {
                        display: block;
                    }

                    &:checked ~ .multiselect_label {
                        width: 40px;
                        left: initial;
                        right: 4px;
                        background: #ffffff url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E") 50% 50% no-repeat;
                    }
                }

                .multiselect_label {
                    position: absolute;
                    top: 2px;
                    left: 2px;
                    width: 100%;
                    height: 46px;
                    cursor: pointer;
                    z-index: 3;
                }

                .field_select {
                    display: none;

                    position: absolute;
                    top: calc(100% - 2px);
                    left: 0;
                    width: 100%;

                    border: 2px solid #cdd6f3;
                    border-bottom-right-radius: 2px;
                    border-bottom-left-radius: 2px;
                    box-sizing: border-box;
                    outline-color: #cdd6f3;
                    z-index: 6;

                    &[multiple] {
                        overflow-y: auto;
                    }

                    option {
                        display: block;
                        padding: 8px 16px;
                        width: calc(370px - 32px);
                        cursor: pointer;

                        &:checked {
                            width: 100%;
                            background-color: #eceff3;
                        }

                        &:hover {
                            width: 100%;
                            background-color: #d5e8fb;
                        }
                    }
                }
            }

            h5 {
                font-family: 'Karla', sans-serif;
                font-weight: 400;
            }

            .input {
                padding: 0 16px;
                border: 1px $gray solid;
                width: 100%;
                height: 46px;
            }

            .input::placeholder {
                color: $gray;
                font-size: 16px;
            }

            .select {
                cursor: pointer;
                max-width: 409px;
                height: 48px;
                background: transparent;
                color: $black;
            }

            &:nth-child(2) {
                max-width: 409px;
            }

            &:nth-child(4) {
                max-width: 345px;
            }

            &:nth-child(5) {
                max-width: 48px;         max-height: 48px;
                width: 100%;
            }
        }
    }
}

</style>
