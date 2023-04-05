import "../sass/app.scss";
import { livewire_hot_reload } from "virtual:livewire-hot-reload";
livewire_hot_reload();
import _ from "lodash";
import $ from "jquery";

window._ = _;
window.jQuery = window.$ = $;

import DataTable from "datatables.net-bs5";
import "datatables.net-responsive";
window.DataTable = DataTable;

import TomSelect from "tom-select";
window.TomSelect = TomSelect;

import select2 from "select2";
window.select2 = select2;
import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
