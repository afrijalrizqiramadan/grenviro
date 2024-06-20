import './bootstrap';
import Alpine from 'alpinejs';
import {Html5QrcodeScanner} from "html5-qrcode"
import {Html5Qrcode} from "html5-qrcode"
import mask from '@alpinejs/mask'
import axios from 'axios';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'
window.Alpine = Alpine;
Alpine.start();
Alpine.plugin(mask)
import flatpickr from 'flatpickr';
window.flatpickr = flatpickr;
import $ from 'jquery';
window.$ = window.jQuery = $;
