import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
import intersect from "@alpinejs/intersect";
import persist from "@alpinejs/persist";
import focus from "@alpinejs/focus";
import collapse from "@alpinejs/collapse";
import morph from "@alpinejs/morph";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import theme from "./components/theme";

Alpine.data('theme', theme);

Alpine.plugin(mask);
Alpine.plugin(intersect);
Alpine.plugin(persist);
Alpine.plugin(focus);
Alpine.plugin(collapse);
Alpine.plugin(morph);
Alpine.plugin(Clipboard);

window.Alpine = Alpine;
Alpine.start();

(function ($) {

})(jQuery);
