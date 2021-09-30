grapesjs.plugins.add('grapesjs-nj-blocks', (editor, opts = {}) => {
    const tm = editor.TraitManager;
    const c = editor.Components;
    const dc = editor.DomComponents;
    const bm = editor.BlockManager;

    // NJ CUSTOM BLOCKS (START)
    /*
    dc.addType('my-input-type', {
        // Make the editor understand when to bind `my-input-type`
        isComponent: el => el.tagName === 'INPUT',

        // Model definition
        model: {
            // Default properties
            defaults: {
                tagName: 'input',
                draggable: 'form, form *', // Can be dropped only inside `form` elements
                droppable: false, // Can't drop other elements inside
                attributes: { // Default attributes
                    type: 'text',
                    name: 'default-name',
                    placeholder: 'Insert text here',
                },
                traits: [
                    'name',
                    'placeholder',
                    { type: 'checkbox', name: 'required' },
                ],
            }
        }
    });


    // The `props` argument will contain only the properties you have declared in `script-props`
    // const script = function(props) {
    //     const myLibOpts = {
    //         prop1: props.myprop1,
    //         prop2: props.myprop2,
    //     };
    //     console.log('My lib options: ' + JSON.stringify(myLibOpts));
    // };

    tm.addType('nj-select-block-trait', {
        // Expects as return a simple HTML string or an HTML element
        createInput({trait}) {
            // Here we can decide to use properties from the trait
            const traitOpts = trait.get('options') || [];
            const data_type = trait.get('data_type') || "";
            const options = traitOpts.length ? traitOpts : [
                {id: 'url', name: 'URL'},
                {id: 'email', name: 'Email'},
            ];

            // Create a new element container and add some content
            const el = document.createElement('div');
            el.innerHTML = `
                    <select class="ajax-select2 href-next__data_type" data-type="${data_type}" multiple>
                        ${options.map(opt => `<option value="${opt.id}">${opt.name}</option>`).join('')}
                    </select>
                    <!--<div class="href-next__url-inputs">
                        <input class="href-next__url" placeholder="Insert URL"/>
                    </div>
                    <div class="href-next__email-inputs">
                        <input class="href-next__email" placeholder="Insert email"/>
                        <input class="href-next__email-subject" placeholder="Insert subject"/>
                    </div>-->
                `;
            const inputType = el.querySelector('.href-next__data_type');
            inputType.addEventListener('change', ev => {
                console.log("546dw35243", ev)
            });
            // Let's make our content interactive
            // const inputsUrl = el.querySelector('.href-next__url-inputs');
            // const inputsEmail = el.querySelector('.href-next__email-inputs');
            // const inputType = el.querySelector('.href-next__type');
            // inputType.addEventListener('change', ev => {
            //     switch (ev.target.value) {
            //         case 'url':
            //             inputsUrl.style.display = '';
            //             inputsEmail.style.display = 'none';
            //             break;
            //         case 'email':
            //             inputsUrl.style.display = 'none';
            //             inputsEmail.style.display = '';
            //             break;
            //     }
            // });

            return el;
        },
    });

    c.addType('nj-casino-block-type', {
        model: {
            defaults: {
                attributes: {multiple: 'multiple', required: true},
                casino_ids: [],
                traits: [
                    {
                        type: 'nj-select-block-trait',
                        name: 'casino_ids',
                        data_type: 'casinos',
                        changeProp: true,
                        options: [
                            {value: '10920', name: 'Casino 1'},
                            {value: '54612', name: 'Casino 2'},
                        ],
                    }
                ],
                // script,
                // Define which properties to pass (this will also reset your script on their changes)
                // 'script-props': ['myprop1', 'myprop2'],
                // ...
                handlePropChange() {
                    console.log('The value of testprop', this.get('testprop'));
                }
            },
            init() {
                console.log('ooeppps')
            },

            update() {
                console.log('12soio21')
            },

        },
        view: {
            async onRender({el, model}) {
                console.log('OOO', el, model)
                const btn = document.createElement('button');
                btn.value = '+';
                btn.innerHTML = "My Casinos";
                // This is just an example, AVOID adding events on inner elements,
                // use `events` for these cases
                btn.addEventListener('click', () => {
                });
                el.appendChild(btn);
            },
        }
    });

    /!*
    // Create a block for the component, so we can drop it easily
    b.add('nj-casino-block', {
        label: 'NJ Casino Block',
        category: 'Extra',
        attributes: { class: 'fa fa-twitter' },
        content: { type: 'nj-casino-block-type' },
    });
    *!/

    bm.add('nj-casino-block', {
        label: 'Casinos',
        content: {type: 'nj-casino-block-type'},
        attributes: {
            class: 'fa fa-star',
            data_type: 'casinos',
        },
        render: ({model, className}) => {
            console.log("ss", model);
            `<div class="${className}__my-wrap">Casino</div>`
        },
        /!*
          Before label
          ${model.get('label')}
          After label
        *!/
    });
*/
    // NJ CUSTOM BLOCKS (END)

    ///// Add heading blocks (START) /////
    for (let i = 1; i <= 6; i++) {
        bm.add(`nj-h${i}-block`, {
            label: `Heading ${i}`,
            category: 'Basic',
            content: `<h${i}>Insert your text here</h${i}>`,
            attributes: {
                class: 'gjs-f-text gjs-fonts',
                title: `Insert heading ${i} block`
            }
        });
    }
    ///// Add heading blocks (END) /////

    ///// Add button blocks (START) /////
    bm.add('nj-button-block', {
        label: 'Button',
        category: 'Basic',
        content: '<button>Insert your text here</button>',
        attributes: {
            class: 'gjs-f-text gjs-fonts',
            title: 'Insert button block'
        }
    });
    ///// Add button blocks (END) /////

    /*
        {
          "activate": 0,
          "select": 0,
          "resetId": 0,
          "label": "Map",
          "disable": 0,
          "media": "",
          "content": {
            "type": "map",
            "style": {
              "height": "350px"
            }
          },
          "category": {
            "id": "Basic",
            "label": "Basic",
            "open": true,
            "attributes": {}
          },
          "attributes": {
            "class": "fa fa-map-o"
          },
          "id": "map"
        }
        */
    /*
        editor.BlockManager.add('nj-video', {
            label: 'NJ Video',
            category: 'Custom',
            attributes: { class: 'fa fa-youtube-play' },
            content: {
                type: 'video',
                src: 'img/video2.webm',
                style: {
                    height: '350px',
                    width: '615px'
                }
            }
        });

        editor.BlockManager.add('grapesjs-nj-casinos', {
            name: 'Casinos',
            category: 'Custom',
            label: '<b>Twitter Feed</b>',
            content: {
                attributes: {
                    'wac-block': 'twitter',
                },
                traits: [
                    {
                        label: 'Twitter',
                        name: 'twitter-title',
                        type: 'text',
                        value: '{{ platform.title }}'
                    }
                ],
                activeOnRender: 1 ,
                content: `<div class="block">Twitter Feed</div>`,
            },
            attributes: {
                class: 'fab fa-twitter fa-1x'
            }
        });*/
    /*
    editor.BlockManager.add('grapesjs-nj-casinos', {
        label: 'Casinos',
        content: '<div class="my-block">This is a simple block</div>',
        category: 'Custom',
        attributes: {
            title: 'Insert h1 block',
            sok: 'Insert h1 block',
        },

    });
    editor.BlockManager.add('h1-block-1', {
        label: 'Heading 1',
        content: '<h1>Put your title here1</h1>',
        category: 'Custom',
        attributes: {
            title: 'Insert h1 block'
        }
    });
    editor.BlockManager.add('twitter', {
        name: 'Twitter Feed',
        category: 'Custom',
        label: '<b>Twitter Feed</b>',
        content: {
            attributes: {
                'wac-block': 'twitter',
            },
            traits: [
                {
                    label: 'Twitter',
                    name: 'twitter-title',
                    type: 'text',
                    value: '{{ platform.title }}'
                }
            ],
            activeOnRender: 1 ,
            content: `<div class="block">Twitter Feed</div>`,
        },
        attributes: {
            class: 'fab fa-twitter fa-1x'
        }
    });
    */
    ///// Add heading blocks (END) /////
});
