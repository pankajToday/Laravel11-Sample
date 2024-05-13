const cta = function (editor) {
    var openDialog = function () {
        return editor.windowManager.open({
            title: 'Noetic plugin',
            body: {
                type: 'panel',
                items: [
                    {
                        type: 'input',
                        name: 'title1',
                        label: 'Title 1'
                    },
                    {
                        type: 'input',
                        name: 'title2',
                        label: 'Title 2'
                    },
                    {
                        type: 'input',
                        name: 'subtext1',
                        label: 'Sub Text 1'
                    },
                    {
                        type: 'input',
                        name: 'subtext2',
                        label: 'Sub Text 2'
                    },
                    {
                        type: 'selectbox', // component type
                        name: 'book_type', // identifier
                        label: 'Book Type',
                        // size: 1, // number of visible values (optional)
                        items: [
                            { value: 'product', text: 'Product Management Checklist' },
                            { value: 'rfp', text: 'RFP Checklist' },
                            { value: 'idea', text: 'Idea Validation checklist' }
                        ]
                    }
                ]
            },
            buttons: [
                {
                    type: 'cancel',
                    text: 'Close'
                },
                {
                    type: 'submit',
                    text: 'Save',
                    primary: true
                }
            ],
            onSubmit: function (api) {
                var data = api.getData();
                /* Insert content when the window form is submitted */
                // editor.insertContent('Title: ' + data.title);
                editor.insertContent(`
                                <div class="full p-10 bg-indigo-800 rounded-lg">
                                    <div class="flex justify-center mt-5">
                                        <span class="text-4xl font-bold text-white">${data.title1}</span>
                                    </div>
                                    <div class="flex justify-center mt-5">
                                        <span class="text-4xl font-bold text-white text-center">${data.title2}</span>
                                    </div>
                                    <div class="flex justify-center mt-5">
                                        <span class="text-xl font-normal text-gray-200">${data.subtext1}</span>
                                    </div>
                                    <div class="flex justify-center my-5">
                                        <span class="text-xl font-medium text-white">${data.subtext2}</span>
                                    </div>
                                    <form id="leadForm" action="/newsletter" method="POST">
                                        <input type="hidden" name="doc_type" value="${data.book_type}" />
                                        <div class="grid grid-cols-2 gap-5">
                                            <div>
                                                <input required type="text" name="first_name" class="w-full px-4 py-3 text-sm font-medium family-montserrat rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="First Name *">
                                            </div>
                                            <div>
                                                <input required type="text" name="last_name" class="w-full px-4 py-3 text-sm font-medium family-montserrat rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Last Name *">
                                            </div>
                                            <div>
                                                <input required type="text" name="email" class="w-full px-4 py-3 text-sm font-medium family-montserrat rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Email *">
                                            </div>
                                            <div>
                                                <button type="submit" class="px-6 py-2.5 mx-auto text-black bg-yellow-400 rounded-md text-lg font-semibold hover:bg-white hover:text-indigo-800">Request my free Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            `);
                api.close();
            }
        });
    }

    /* Add a button that opens a window */

    editor.ui.registry.addButton('cta', {
        text: 'CTAs',
        onAction: function () {
            openDialog()
        }
    });
}

export { cta }
