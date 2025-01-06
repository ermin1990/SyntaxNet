import './bootstrap';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

document.addEventListener('DOMContentLoaded', function() {
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['bold', 'italic', 'underline'],
                ['link'],
                ['image']
            ]
        }
    });


    quill.on('text-change', function() {
        document.querySelector('#content').value = quill.root.innerHTML;
    });

    quill.on('text-change', function() {
        document.querySelector('#content').value = quill.root.innerHTML;
    });
});


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
