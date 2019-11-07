window.shouldShowLoad = !0, window.modalInstances = {
	actual: null,
	modals: []
}, Number.prototype._formatMoney = function (e, a, t, o) {
	var s = this,
		n = (e = isNaN(e = Math.abs(e)) ? 2 : e, a = null == a ? "." : a, t = null == t ? "," : t, s < 0 ? "-" : ""),
		i = String(parseInt(s = Math.abs(Number(s) || 0).toFixed(e))),
		l = (l = i.length) > 3 ? l % 3 : 0;
	return (o ? "" : "RD$") + n + (l ? i.substr(0, l) + t : "") + i.substr(l).replace(/(\d{3})(?=\d)/g, "$1" + t) + (e ? a + Math.abs(s - i).toFixed(e).slice(2) : "")
};
var _money = function (e) {
		return parseFloat(e)._formatMoney(2, ".", ",")
	},
	_capitalize = function (e) {
		return e.toString().toUpperCase()
	},
	keys = [37, 38, 39, 40];

function preventDefault(e) {
	(e = e || window.event).preventDefault && e.preventDefault(), e.returnValue = !1
}

function keydown(e) {
	for (var a = keys.length; a--;)
		if (e.keyCode === keys[a]) return void preventDefault(e)
}

function wheel(e) {
	preventDefault(e)
}

function disable_scroll() {
	window.addEventListener && window.addEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = wheel, document.onkeydown = keydown
}

function enable_scroll() {
	window.removeEventListener && window.removeEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = document.onkeydown = null
}

function initializer(e) {
    
	// e.find("select").not(".notselect2").select2({
	// 	allowClear: !0,
	// 	placeholder: "SELECCIONAR"
	// }), jQuery("input.date").datepicker({
	// 	format: "yyyy-mm-dd"
	// }), jQuery("input.money").mask("000,000,000,000,000.00", {
	// 	numericInput: !0,
	// 	placeholder: "0",
	// 	showMaskOnHover: !1,
	// 	greedy: !1,
	// 	reverse: !0
	// }), jQuery(".moneyNoCents").mask("000,000,000,000,000", {
	// 	numericInput: !0,
	// 	placeholder: "0",
	// 	showMaskOnHover: !1,
	// 	greedy: !1,
	// 	reverse: !0
	// }), e.find("input.cedula").mask("000-0000000-0", {
	// 	reverse: !0
	// }), e.find("input.money2").mask("000,000,000,000,000.00", {
	// 	reverse: !0
	// }), e.find("input.phone").mask("(000) 000-0000"), e.find("input.date2").datepicker({
	// 	format: "yyyy-mm-dd",
	// 	autoclose: !0
	// }), e.find("select").next().width("100%"), e.find(".i-checks").iCheck({
	// 	checkboxClass: "icheckbox_square-green",
	// 	radioClass: "iradio_square-green",
	// 	disabledClass: "",
	// 	cursor: !0
	// }), $("button.loading").on("click", function () {
	// 	var e = $(this);
	// 	e.button("loading"), setTimeout(function () {
	// 		e.button("reset")
	// 	}, 2e3)
	// }), setClientFinder(), quicklyResults()
}

function load_screen(e, a, t, o, s, n) {
	$(".div-principal-wrapper").addClass("loading");
	var i = "div-secundary-wrapper-" + t,
		l = "";
	1 == s ? l = "div-principal-wrapper" : 2 == s ? ($("#" + i).show(), l = i) : l = 3 == s ? t : "div-principal-wrapper";
	try {
		//2 !== s && 3 !== s && (window.history.pushState(a, "", "index.php/#" + a), window.current_url = "index.php/#" + a, window.previous_url = window.location);
		var r = Array("contacts_users/contact_general", "contacts_users/renewal_reminders", "contacts_users/documents", "contacts_users/comments", "parts_inventory/documents");
		if (localStorage.getItem("navegacion")) c = [], c = JSON.parse(localStorage.getItem("navegacion")), "undefined" == typeof guardarEnSession && c[c.length - 1] !== a && (-1 == jQuery.inArray(a, r) && c.push(a), localStorage.setItem("navegacion", JSON.stringify(c)));
		else {
			var c = []; - 1 == jQuery.inArray(a, r) && "undefined" == typeof guardarEnSession && c.push(a), localStorage.setItem("navegacion", JSON.stringify(c))
		}
		$.ajax({
			url: $("#base_url").val()+'index.php/' + a,
			type: "POST",
			dataType: "html",
			async: !0,
			data: {
				csrftoken: 1
			},
			success: function (e) {
				try {
					jQuery.parseJSON(e).status ? t() : window.location.href = $("#base_url").val()
				} catch (e) {
					t()
				}

				function t() {
					$("#" + l).html(e), $("#page_title").html("PrestamosCloud | " + $(".page-title").html()), initializer($("#" + l)), /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && $(".mobile-toggle-nav").hasClass("is-active") && n && ($(".mobile-toggle-nav").removeClass("is-active"), $(".app-container").removeClass("sidebar-mobile-open")), setTimeout(function () {
						$(".div-principal-wrapper").removeClass("loading")
					}, 100)
				}
			}
		}).always(function (e, a) {
			"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details."), setTimeout(function () {
				$(".div-principal-wrapper").removeClass("loading")
			}, 300)
		})
	} catch (e) {
		alert(e.message)
	}
}

function anadirGoBack(e) {
	var a = JSON.parse(localStorage.getItem("navegacion")),
		t = e == a[a.length - 2] ? a[a.length - 3] : a[a.length - 2],
		o = '<button class="btn-shadow mr-3 btn btn-dark" id="70_tag"onclick="goBack(\'' + t + '\')"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;VOLVER</button>';
	a.length > 1 && void 0 !== t && $(".div-btn-back").html(o)
}

function goBack(e) {
	if (null === localStorage.getItem("navegacion") || "null" === localStorage.getItem("navegacion") || "" == localStorage.getItem("navegacion"));
	else {
		var a = [];
		(a = JSON.parse(localStorage.getItem("navegacion"))).splice(-1, 1), localStorage.setItem("navegacion", JSON.stringify(a))
	}
	load_screen($("#base_url").val() + "index.php", e, "70_tag", "", "1", 1, 1, 3, !1)
}

function openNewWindow(e, a, t, o) {
	load_screen(e, a, "", "", t, o)
}

function fill_table(e, a, t, o, s, n, i) {
	var l = "boolean" != typeof s || s;
	if ($("#base_url").val(), o = "boolean" != typeof o || o, isDataTable(a))(p = $("#" + a).DataTable()).ajax.url(e), p.ajax.reload();
	else {
		var r = {
			paging: l,
			processing: !0,
			serverSide: o,
			scrollY: "number" == typeof t && t,
			ScrollX: "100%",
			ajax: {
				url: e,
				method: "post",
				always: function (e, a) {
					"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
				}
			},
			dom: 'T<"clear">lfrtip',
			tableTools: {
				sSwfPath: "/connectyourhome/assets/swf/copy_csv_xls_pdf.swf"
			}
		};
		if (void 0 !== i && (r[i.name] = i.function), void 0 !== n)
			if ("object" == typeof n) {
				if (!(n.length > 1)) return fill_table(e, a, t, s, parseInt(n[0]));
				n.map(function (e) {
					return parseInt(e)
				}), n.sort();
				for (var c = [], d = n[n.length - 1], u = 0; u < d.length; u++) c.push(null);
				for (u = 0; u < n.length; u++) c[n[u]] = {
					searchable: !1,
					sortable: !1
				};
				r.columns = c
			} else if ("number" == typeof n) {
			for (u = parseInt(n), c = [], u = 0; u < u; u++) c.push(null);
			c.push({
				searchable: !1,
				sortable: !1
			}), r.columns = c
		}
		var p = $("#" + a).DataTable(r)
	}
}

function fill_table_complex(e, a, t, o, s, n, i) {
	n = void 0 !== n ? n : 0, $("#base_url").val();
	var l = $("#" + t).serialize();
	l += "&csrftoken=" + 1, $.ajax({
		url: e,
		type: o,
		data: l,
		async: !0,
		success: function (e) {
			if ($data = jQuery.parseJSON(e), $("#" + a).dataTable().fnClearTable(), $data.aaData.length > 0) {
				$("#" + a).dataTable().fnDestroy(), $("#" + a + " thead").html(get_thead($data.sColumns));
				var t = {
					scrollY: "50vh",
					buttons: ["print"],
					data: $data.aaData,
					lengthMenu: [
						[10, 50, -1],
						[10, 50, "Todos"]
					]
				};
				void 0 !== i && (t[i.name] = i.function), $("#" + a).DataTable(t).on("search.dt", function (e) {}), void 0 !== i && i($data.aaData, $data.extra_data)
			} else $("#" + a + " tbody").html('<tr class="odd"><td valign="top" colspan="' + $data.sColumns.length + '" class="dataTables_empty">No data.</td></tr>')
		}
	}).always(function (e, a) {
		"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
	}).done(function () {
		setTimeout(function () {
			$(".div-principal-wrapper").removeClass("loading")
		}, 300)
	}).fail(function () {
		$(".div-principal-wrapper").removeClass("loading")
	})
}

function capitalize(e) {
	return e[0].toUpperCase() + e.slice(1)
}

function set_title(e) {
	$current_title = $("#sp_title").text().split("|"), $string = capitalize(e.replace("_", " ")), $("#sp_title").each(function (e, a) {
		$(this).html($current_title[0] + " | " + $string)
	}), $("#sub_title").html(" | " + $string)
}

function set_loading(e) {
	var a = $("div.loadingMensaje-")[0];
	if (e = void 0 === e ? window.currentLoading : e, e = "", void 0 === a) {
		var t = document.createElement("div");
		t.className = "loader loader-default is-active";
		for (var o = 0; o < 3; o++) dot = document.createElement("div"), dotHolder = document.createElement("div"), dotHolder.appendChild(dot), t.appendChild(dotHolder);
		var s = document.createElement("div");
		s.className = "mensajeHolder", s.innerHTML = e;
		var n = document.createElement("div");
		n.className = "loadIndicatorHolder", n.appendChild(t), (a = document.createElement("div")).className = "loadingMensaje-", a.appendChild(s), a.appendChild(n), (i = document.createElement("div")).style.height = $(document).height() + "px", i.className = "loadHolder", $(".content-wrapper").prepend(i), $(".content-wrapper").prepend(a)
	} else {
		var i;
		(i = $("div.loadHolder")[0]).style.display = "block", i.style.height = $(document).height() + "px", a.style.display = "block", $(a).children("div.mensajeHolder")[0].innerHTML = e
	}
	disable_scroll()
}

function unset_loading() {
	$.LoadingOverlay("hide");
	var e = $(".content-wrapper>div.loadingMensaje-")[0];
	void 0 !== e && ($("div.loadHolder")[0].style.display = "none", e.style.display = "none"), window.currentLoading = "Loading Data", enable_scroll()
}

function unset_loading2() {
	$.LoadingOverlay("hide");
	var e = $("body>div.loadingMensaje2")[0];
	void 0 !== e && ($("div.loadHolder2")[0].style.display = "none", e.style.display = "none"), window.currentLoading = "Loading Data", enable_scroll(), window.shouldShowLoad = !0
}

function remove_active_class() {
	$("a").each(function (e) {
		$(this).removeClass("active")
	})
}

function add_tab(e, a, t) {
	title_ = e.replace(/ /g, "_");
	var o = Math.floor(7988 * Math.random()) + 8e3;
	id = "tabs-" + title_ + o;
	var s = $("#tabs").tabs();
	window.activeTabID = id;
	var n = "<li name='" + id + "-li' id='" + id + "-li' class='active' onclick='remove_active_tab(this)'><a href='#{href}'>#{label} <i style='color:red;cursor: pointer;' class='fa fa-trash-o' onclick='close_tab(this,\"" + s + '","' + e + '","' + t + "\")'></i></a></li>";
	li = $(n.replace(/#\{href\}/g, "#" + id).replace(/#\{label\}/g, e)), s.find(".ui-tabs-nav:first").html(li), s.append("<div id='" + id + "' class='parent_tab'>" + a + "</div>"), s.tabs("refresh"), o++, s.find(".ui-tabs-nav").sortable({
		axis: "x",
		stop: function () {
			s.tabs("refresh")
		}
	}), initializer(s.find("#" + id)), $("#tabs").tabs({
		disabled: []
	}).find('a[href="#' + id + '"]').trigger("click"), void 0 === window.tabsID && (window.tabsID = []), window.tabsID[t] = id
}

function close_tab(e, a, t, o) {
	var s = $(e).closest("li").remove().attr("aria-controls");
	$("#" + o).removeClass("active"), $("#" + s).remove(), window.tabsID.pop(o), onCloseTab(), window.activeTabID = $("ul.ui-tabs-nav li:nth-child(1)").prop("id")
}

function close_tab_by_id(e) {
	close_tab($("#tabs").find('a[href="#' + e + '"]'), void 0, void 0, "")
}

function onCloseTab() {
	$(".ui-tabs ul li a:nth-child(1)").first().click(), setTimeout(function () {
		$("ul.ui-tabs-nav li:nth-child(1)").addClass("active"), window.activeTabID = $("ul.ui-tabs-nav li:nth-child(1)").prop("id")
	}, 10)
}

function fill_roles_select(e, a, t) {
	$.ajax({
		url: e,
		type: "POST",
		data: {
			param: "static",
			csrftoken: 1
		},
		success: function (e) {
			$data = jQuery.parseJSON(e), $html = "";
			for (var o = 0; o < $data.data.length; o++) "number" == typeof $data.data[o].id ? selected = $data.data[o].id == parseInt(t) ? "selected" : "" : selected = $data.data[o].id == t ? "selected" : "", $html += "<option value = '" + $data.data[o].id + "' " + selected + ">" + $data.data[o].name + "</option>";
			$("#" + a).append($html)
		}
	})
}

function getPermissions(e, a, t) {
	var o = $("#base_url").val() + "configuration/roles_has_permission";
	$.ajax({
		url: o,
		type: "GET",
		data: {
			rol: e,
			permission: a
		},
		success: function (e) {
			"0" != e && $("#li" + t).attr("checked", "checked")
		}
	})
}

function load_roles_permissions(e) {
	$.ajax({
		url: e,
		type: "POST",
		data: {
			csrftoken: 1
		},
		success: function (e) {
			var a = jQuery.parseJSON(e),
				t = $("#ulPermissionsList"),
				o = $("#selectRoles").val();
			if (t.empty(), console.log(a), "0" != o)
				for (var s = 0; s < a.id.length; s++) {
					var n = '<div class="col-md-8 no-padding card-header">';
					n += '<div class="card-list-issues-h">', n += '<p><label><input class="liPer" type="checkbox" value="' + a.id[s] + '" id ="li' + a.id[s] + '" style="margin: 0 5px;">', n += "<span lang='' name='btnOPT[]'>" + a.title[s] + "</span></label></p></div>", n += "<div class='content-check></div>\n", t.append(n), getPermissions(o, a.id[s], a.id[s]), 0 != a.child[s] && (t.append("<div id='subUl" + a.id[s] + "'>"), getSubnodes(a.child[s], a.id[s]), t.append("</div>"))
				}
		}
	})
}

function getSubnodes(e, a) {
	for (var t = $("#subUl" + a), o = $("#selectRoles").val(), s = 0; s < e.id.length; s++) {
		var n = '<div class="col-md-6"><label class="checkbox-inline">';
		n += "<input class = 'liPer' type='checkbox' value='" + e.id[s] + "' id = 'li" + e.id[s] + "'>", n += "<span lang='' name='btnOPT[]' style='font-size: 1.1em;font-weight: 600;color: #828181;'>" + e.title[s] + "</span>\n", n += "</label></div>", t.append(n), getPermissions(o, e.id[s], e.id[s]), 0 != e.child[s] && (t.append("<li><ul id = 'subUl" + data.id[s] + "'>"), getSubnodes(e.child[s], e.id[s]), t.append("</ul></li>"))
	}
}

function get_thead(e) {
	var a = e.split(",");
	for (var t in $html = "<tr>", a) $html += "<th>" + a[t] + "</th>";
	return $html += "</tr>", $html
}

function get_tbody(e) {
	for (var a in $html = "<tr>", e) $html += "<td>" + e[a] + "</td>";
	return $html += "</tr>", $html
}

function remove_active_tab(e) {
	$("li.active").each(function (e) {
		$(this).removeClass("active")
	}), $(e).addClass("active"), window.activeTabID = e.id.slice(0, -3)
}

function set_form(e, a, t) {
	var o = $("#base_url").val() + "form/set/" + e;
	if (validate_form(e = $("#" + e)), e.valid()) {
		var s = e.serialize();
		void 0 !== t && (null == t && "object" != typeof t || (plus = jQuery.param(t, !0), plus = decodeURIComponent(plus), s += "&" + plus)), s += "&csrftoken=" + 1, $.ajax({
			url: o,
			type: "POST",
			data: s,
			dataType: "json",
			async: !0,
			success: void 0 === a ? function (e) {
				manage_response(e)
			} : function (e) {
				a(e)
			}
		}).always(function (e, a) {
			"success" != a && alert("Upps, hubo un error: " + e.statusText + "\nSi el problema persiste, favor contactar a info@cloudservices.com.do.")
		})
	} else toastr.error("Favor completar todos los campos requeridos")
}

function save_form(e, a, t, o, s, n, i, l, r) {
	if (validate_form(e, r), (e = void 0 !== r ? r.find("#" + e).eq(0) : $("#" + e)).valid()) {
		var c = a + "/" + s + "/" + n,
			d = e.serialize();
		void 0 !== i && (null == i && "object" != typeof i || (plus = jQuery.param(i, !0), plus = decodeURIComponent(plus), d += "&" + plus)), d += "&csrftoken=" + 1, $.ajax({
			url: c,
			type: t,
			data: d,
			dataType: "json",
			async: !0,
			success: void 0 === l ? function (e) {
				var a = e;
				a.statuss ? $("#" + o).html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg + "</div>") : ($("#" + o).html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg + "</div>"), alert(a.msg))
			} : function (e) {
				l(e, r)
			}
		}).always(function (e, a) {
			"success" != a && ($("#" + o).html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Upps, was an error: " + e.statusText + "<br>Please, contact info@cloudservices.com.do for more details.</div>"), alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details."))
		})
	}
}

function get_loan_contract(e = 0) {
	e > 0 && window.open($("#base_url").val() + "contrato/get_loan_contract/" + e, "_blank")
}

function validate_form(e, a) {
	void 0 !== a ? e = a.find("#" + e).eq(0) : "string" == typeof e && (e = $("#" + e)), e.validate({
		validClass: "has-success",
		errorClass: "has-error",
		ignore: "input[type=hidden],.ignore",
		highlight: function (e) {
			$(e).closest(".form-group").addClass("has-error")
		},
		unhighlight: function (e) {
			formGroup = $(e).closest(".form-group"), $(formGroup).removeClass("has-error"), $(formGroup).addClass("has-success")
		},
		invalidHandler: function (e, a) {
			return !1
		},
		submitHandler: function (e) {
			return !0
		}
	})
}

function inactive_data(e, a, t) {
	$.ajax({
		url: $("#base_url").val() + "common_controller/inactive_data",
		type: "post",
		dataType: "json",
		data: {
			id: a,
			table: e,
			csrftoken: 1
		},
		success: function (e) {
			var a = e;
			a.statuss ? $("#" + t).html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg) : $("#" + t).html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg + "</div>")
		}
	}).always(function (e, a) {
		"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
	})
}

function confirm_inactive_date(e, a, t) {
	BootstrapDialog.confirm({
		title: "WARNING!",
		message: "Seguro que desea desactivar este dato?",
		type: BootstrapDialog.TYPE_WARNING,
		callback: function (o) {
			o && inactive_data(e, a, t)
		}
	})
}

function active_data(e, a, t) {
	$.ajax({
		url: $("#base_url").val() + "common_controller/active_data",
		type: "post",
		dataType: "json",
		data: {
			id: a,
			table: e,
			csrftoken: 1
		},
		success: function (e) {
			var a = e;
			a.statuss ? $("#" + t).html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg) : $("#" + t).html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg + "</div>")
		}
	}).always(function (e, a) {
		"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
	})
}

function open_modal(e, a, t, o, s, n = !0) {
	$("#myModal .modalContent").load(a, function () {
		initializer($(".modal-body")), $("#myModal").modal({
			show: !0,
			buttons: t
		}), modalInstances.actual = "myModal"
	})
}

function closeLastModal() {
	null != modalInstances.actual && $("#myModal").modal("hide"), $(".modal").modal("hide")
}

function clear_inputs_form(e) {
	$("#" + e + ' input[type="text"]').val("").trigger("change")
}

function setupHeaderTable(e, a) {
	var t = function () {
		var t = $("#" + e),
			o = "";
		if ("object" == typeof a ? (o = new Array, $.each(a, function (e, a) {
				val = $("#" + a)[0].value, o.push(val)
			})) : o = $("#" + a)[0].value, table_tr = t.find("tbody tr:not(.active)"), table_tr.each(function (e, a) {
				var t = $(a).find("td");
				if (t.length > 0) {
					var s = !1;
					foundCases = new Array, t.each(function (e, a) {
						if ("object" == typeof o) {
							for (var t = 0; t < o.length; t++) val = o[t], new RegExp(val.toLowerCase(), "i").test($(a).text().toLowerCase()) ? foundCases[t] = !0 : void 0 === foundCases[t] && (foundCases[t] = !1);
							if (-1 == $.inArray(!1, foundCases)) return s = !0, !1
						} else if (new RegExp(o, "i").test($(a).text())) return s = !0, !1
					}), "object" == typeof s ? $.inArray(!1, s) ? $(a).hide() : $(a).show() : 1 == s ? $(a).show() : $(a).hide()
				}
			}), "object" != typeof o) table_tr.unhighlight(), table_tr.highlight(o);
		else
			for (var s = 0; s < o.length; s++) table_tr.unhighlight(), table_tr.highlight(o[s])
	};
	$(function () {
		"object" != typeof a ? ($("input#" + a).keyup(t), $("#" + a).change(t)) : $.each(a, function (e, a) {
			$("input#" + a).keyup(t), $("#" + a).change(t)
		})
	})
}

function in_array(e, a) {
	for (var t in a)
		if (a[t] == e) return !0;
	return !1
}

function checkSession(e) {
	window.shouldShowLoad = !1, $.ajax({
		url: $("#base_url").val() + "index.php/session/isLoggedInJson",
		type: "POST",
		data: {
			csrftoken: 1
		},
		success: function (a) {
			var t = JSON.parse(a);
			0 == t.status && (t.message, window.onbeforeunload = UnPopIt, alert("Your session has expired. Please login once again.", function () {
				window.location = $("#base_url").val() + "index.php/session/logout"
			}), clearInterval(e))
		}
	}).always(function (e, a) {})
}

function load_screen_on_div(e, a, t) {
	var o = $("#" + t).serialize(),
		s = $("#fecha").val();
	o += "&csrftoken=" + 1, "" != s ? $.ajax({
		url: e,
		type: "POST",
		dataType: "html",
		async: !0,
		data: o,
		success: function (e) {
			$("#" + a).html(e)
		}
	}).always(function (e, a) {
		"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
	}) : alert("The report data field can not be empty")
}

function PopIt() {
	return "WARNING:"
}

function UnPopIt() {}

function change_password() {
	actual_password = $("#exampleInputEmail1").val(), new_password = $("#exampleInputPassword1").val(), repeat_password = $("#exampleInputPassword2").val(), new_password != repeat_password ? alert("Oops! Your new password and your confirmed password field do not match. Please, try again.") : $.ajax({
		url: $("#base_url").val() + "index.php/session/update_password",
		type: "POST",
		data: {
			actual_password: actual_password,
			new_password: new_password,
			csrftoken: 1
		},
		success: function (e) {
			var a = JSON.parse(e);
			alert(a.message)
		}
	}).always(function (e, a) {
		"success" != a && alert("Upps, was an error: " + e.statusText + "\nPlease, contact info@cloudservices.com.do for more details.")
	})
}

function timeStamp() {
	var e = new Date,
		a = [e.getMonth() + 1, e.getDate(), e.getFullYear()],
		t = [e.getHours(), e.getMinutes(), e.getSeconds()],
		o = t[0] < 12 ? "AM" : "PM";
	t[0] = t[0] < 12 ? t[0] : t[0] - 12, t[0] = t[0] || 12;
	for (var s = 1; s < 3; s++) t[s] < 10 && (t[s] = "0" + t[s]);
	return a.join("/") + " " + t.join(":") + " " + o
}

function manage_response(e) {
	var a;
	(a = "object" == typeof e ? e : JSON.parse(e)).statuss ? swal("Correcto!", a.msg, "success") : swal("Error!", a.msg, "error")
}

function set_file_inputs() {
	$(".au_file_input").each(function () {
		var e = $(this).attr("rel_id"),
			a = $(this).attr("rel_type");
		if (0 != e) {
			var t = $(this);
			$.ajax({
				method: "GET",
				url: $("#base_url").val() + "common_controller/get_files/" + e + "/" + a,
				success: function (e) {
					var a = new Array,
						o = new Array;
					if ("ok" == (e = $.parseJSON(e)).status) {
						for (var s in e.data) {
							var n = e.data[s];
							a.push(n.file_url), o.push({
								url: n.delete_url
							})
						}
						t.fileinput({
							language: "es",
							initialPreview: a,
							initialPreviewConfig: o,
							overwriteInitial: !1,
							initialPreviewAsData: !0,
							showRemove: !1,
							showUpload: !1,
							dropZoneEnabled: !1,
							initialPreviewShowDelete: !0,
							initialPreviewFileType: "image"
						}).on("filedeleted", function () {
							setTimeout(function () {
								swal("Exito!", "Archivo eliminado correctamente.", "success")
							}, 700)
						}).on("filepredelete", function (e) {
							var a = !0;
							return confirm("Seguro que desea eliminar este archivo?") && (a = !1), a
						})
					}
				}
			})
		} else $(this).fileinput({
			language: "es"
		})
	}), $(".au_file_input_read").each(function () {
		var e = $(this).attr("rel_id"),
			a = $(this).attr("rel_type");
		if (0 != e) {
			var t = $(this);
			$.ajax({
				method: "GET",
				url: $("#base_url").val() + "common_controller/get_files/" + e + "/" + a,
				success: function (e) {
					var a = new Array,
						o = new Array;
					if ("ok" == (e = $.parseJSON(e)).status) {
						for (var s in e.data) {
							var n = e.data[s];
							a.push(n.file_url), o.push({
								url: n.delete_url
							})
						}
						t.fileinput({
							language: "es",
							initialPreview: a,
							initialPreviewConfig: o,
							overwriteInitial: !1,
							initialPreviewAsData: !0,
							showRemove: !1,
							showUpload: !1,
							dropZoneEnabled: !1,
							initialPreviewShowDelete: !1,
							initialPreviewFileType: "image"
						}).on("filedeleted", function () {
							setTimeout(function () {
								swal("Exito!", "Archivo eliminado correctamente.", "success")
							}, 700)
						}).on("filepredelete", function (e) {
							var a = !0;
							return confirm("Seguro que desea eliminar este archivo?") && (a = !1), a
						})
					}
				}
			})
		} else $(this).fileinput({
			language: "es"
		})
	}), $(".au_file_input_ajax").each(function () {
		var e = $(this).attr("rel_id"),
			a = $(this).attr("rel_type");
		if (0 != e) {
			var t = $(this);
			$.ajax({
				method: "GET",
				url: $("#base_url").val() + "common_controller/get_files/" + e + "/" + a,
				success: function (o) {
					var s = new Array,
						n = new Array;
					if ("ok" == (o = $.parseJSON(o)).status) {
						for (var i in o.data) {
							var l = o.data[i];
							s.push(l.file_url), n.push({
								url: l.delete_url
							})
						}
						t.fileinput({
							initialPreview: s,
							initialPreviewConfig: n,
							overwriteInitial: !1,
							initialPreviewAsData: !0,
							showRemove: !1,
							showUpload: !0,
							initialPreviewShowDelete: !0,
							dropZoneEnabled: !1,
							initialPreviewFileType: "image",
							uploadUrl: $("#base_url").val() + "common_controller/handle_files/" + e + "/" + a
						}).on("filedeleted", function () {
							setTimeout(function () {
								swal("Exito!", "Archivo eliminado correctamente.", "success")
							}, 700)
						}).on("filepredelete", function (e) {
							var a = !0;
							return confirm("Seguro que desea eliminar este archivo?") && (a = !1), a
						})
					}
				}
			})
		} else $(this).fileinput()
	})
}

function set_datatables(e) {
	$(".auto_table").each(function () {
		var a = $(".auto_form").eq(0).serializeArray(),
			t = $(this).attr("id"),
			o = t.replace("dt_", "");
		o = o.replace("_table", "");
		var s = $(".form_" + o);
		s.length > 0 && (a = $(s).eq(0).serializeArray());
		var n = admin_url + "/tables/get/" + o;
		$("#" + t).DataTable().destroy();
		var i = $("#" + t).DataTable({
			language: {
				url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
			},
			processing: !0,
			lengthMenu: [
				[10, 50, 100, 200, -1],
				[10, 50, 100, 200, "Todos"]
			],
			serverSide: !0,
			buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5", "print"],
			dom: 'l<"right"B>frtip',
			drawCallback: function (e) {
				$('[data-toggle="tooltip"]').tooltip(), $(".count-" + o).html(e.fnRecordsTotal())
			},
			initComplete: function (a, t) {
				$(".table-loading").removeClass("table-loading"), console.log("termine...."), void 0 !== e && e(t, i)
			},
			ajax: {
				url: n,
				data: function (e) {
					for (var t in a) a.hasOwnProperty(t) && (void 0 !== e[a[t].name] ? Array.isArray(e[a[t].name]) ? e[a[t].name].push(a[t].value) : e[a[t].name] = [e[a[t].name], a[t].value] : e[a[t].name] = a[t].value)
				}
			}
		})
	})
}

function set_datatables_specific(e) {
	var a = $(".auto_form").eq(0).serializeArray(),
		t = (e = e).replace("dt_", "");
	t = t.replace("_table", "");
	var o = admin_url + "tables/get/" + t,
		s = $("." + t + "_form");
	console.log("." + t + "_form"), s.length > 0 && (a = $(s).eq(0).serializeArray()), $("#" + e).DataTable().destroy(), $("#" + e).DataTable({
		language: {
			url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
		},
		processing: !0,
		lengthMenu: [
			[10, 20, 30, 50, -1],
			[10, 20, 30, 50, "Todos"]
		],
		serverSide: !0,
		buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
		dom: 'l<"right"B>frtip',
		drawCallback: function (e) {
			$('[data-toggle="tooltip"]').tooltip(), $(".count-" + t).html(e.fnRecordsTotal())
		},
		initComplete: function (e, a) {
			$(".table-loading").removeClass("table-loading")
		},
		ajax: {
			url: o,
			data: function (e) {
				for (var t in a) a.hasOwnProperty(t) && (void 0 !== e[a[t].name] ? Array.isArray(e[a[t].name]) ? e[a[t].name].push(a[t].value) : e[a[t].name] = [e[a[t].name], a[t].value] : e[a[t].name] = a[t].value)
			}
		}
	})
}

function init_html_dataTable(e, a = !0, t = !1, o = !0, s = !0, n = !0, i = !1) {
	$("#" + e).DataTable({
		paging: a,
		fixedHeader: t,
		ordering: o,
		info: s,
		searching: n,
		lengthMenu: [
			[10, 50, -1],
			[10, 25, 50, "Todos"]
		]
	})
}

function check_notifications() {
	return 0
}

function check_enganche() {
	check_is_moroso();
	var e = $("#client_id").val();
	$.ajax({
		url: $("#base_url").val() + "prestamos/get_active_loans/" + e,
		type: "POST",
		data: {
			csrftoken: 1
		},
		success: function (e) {
			var a = JSON.parse(e);
			if (a.cantidad > 0) {
				for (var t = '<div class="col-md-12 sub-title-modal reenganche-head">          <span class="block blink">            Este cliente cuenta con ' + a.cantidad + ' prestamo(s) activo(s)          </span>        </div><div class="divrenganches">', o = 0; o < a.cantidad; o++) console.log(a.prestamo[o]), t += '<div class="form-group col-md-2 col-sm-6">          <label for="">Inicio</label>          <input type="text" value="' + a.prestamo[o].start_date + '" readonly="" class="form-control date2 inputs start_date">        </div>        <div class="form-group col-md-3 col-sm-6">          <label for="" title="Total del prestamo restante (capital + interes + mora)">Total prestamo restante</label>          <input type="text" value="' + a.prestamo[o].monto_restante + '" readonly="" class="form-control date2 inputs monto_restante" title="Total del prestamo restante (capital + interes + mora)">        </div>        <div class="form-group col-md-3 col-sm-6">          <label for="" title="Capital restante + mora, SIN INTERESES.">Solo Capital restante</label>          <input type="text" value="' + a.prestamo[o].capital_restante + '" readonly="" class="form-control date2 inputs capital_restante" title="Capital restante + mora, SIN INTERESES PENDIENTE.">        </div>        <div class="form-group col-md-2 col-sm-6">          <label for="">Cuotas restante</label>          <input type="text" value="' + a.prestamo[o].cuotas_restantes + '" readonly="" class="form-control date2 inputs cuotas_restantes">        </div>        <div class="form-group col-md-2 col-sm-12">          <div class="dropdown">            <button type="button" style="margin-top: 24px;" class="btn btn-danger dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                Reenganchar            </button>            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">              <a class="dropdown-item btn" onclick="reenganchar(' + a.prestamo[o].loan_id + ",'" + a.prestamo[o].monto_restante + '\')">Reenganchar Prestamo Total</a>              <div class="dropdown-divider"></div>              <a class="dropdown-item btn" onclick="reenganchar(' + a.prestamo[o].loan_id + ",'" + a.prestamo[o].capital_restante + '\')">Reenganchar Solo Capital</a>            </div>          </div>        </div>        <div class="clearfix"></div>        <hr>';
				t += "</div>", $(".reenganchediv").html(t)
			} else $(".reenganchediv").html("")
		}
	})
}

function check_is_moroso() {
	var e = $("#client_id").val();
	$.ajax({
		url: $("#base_url").val() + "clientes/is_moroso/" + e,
		type: "POST",
		data: {
			client_id: e,
			csrftoken: 1
		},
		success: function (e) {
			1 == e ? ($(".bt_calcular").attr("disabled", "disabled"), $(".btn_guardar_prestamo").hide(), swal("Cliente moroso!", "No se puede crear el prestamo, devido a que este cliente esta marcado como MOROSO.", "error")) : ($(".bt_calcular").removeAttr("disabled"), $(".btn_guardar_prestamo").show())
		}
	})
}

function save_new_empresa(e, a, t = 0) {
	e = $("#" + e).serialize(), e += "&csrftoken=" + 1, t = t > 0 ? t : "", $.ajax({
		url: $("#base_url").val() + a + "/" + t,
		type: "POST",
		dataType: "JSON",
		data: e,
		success: function (e) {
			var a = e.statuss ? "success" : "warning";
			swal(e.msg, "", a), e.statuss && (closeLastModal(), fill_empresas())
		}
	})
}

function add_credit_note(e = 0) {
	var a = e > 0 ? "updated_credit_note" : "store_credit_note";
	open_modal(e > 0 ? "Editar Nota de Crédito" : "Agregar Nota de Crédito", $("#base_url").val() + "configuration/add_credit_note/" + e, [{
		label: "Cancelar",
		cssClass: "btn btn-danger",
		action: function (e) {
			e.close()
		}
	}, {
		label: "Guardar",
		cssClass: "btn btn-info",
		action: function (t) {
			var o = $(".cc_add_form");
			if (o.valid()) {
				var s = o.serialize();
				s += "&csrftoken=" + 1, $.ajax({
					url: $("#base_url").val() + "configuration/" + a + "/" + e,
					type: "POST",
					data: s,
					dataType: "JSON",
					success: function (e) {
						e.statuss && (manage_response(e), set_datatables(), t.close())
					}
				})
			}
		}
	}])
}

function remove_credit_note(e) {
	$.ajax({
		url: $("#base_url").val() + "configuration/remove_credit_note",
		type: "POST",
		dataType: "JSON",
		data: {
			id: e,
			csrftoken: 1
		},
		success: function (e) {
			manage_response(e), set_datatables()
		}
	})
}

function get_notifications(e, a, t, o) {}

function get_notifications_modal() {
	open_modal("", $("#base_url").val() + "/notificaciones/user_notifications_view", [{
		label: "Marcar Como leido",
		cssClass: "btn btn-presta btn-info modal-close",
		action: function (e) {
			e.close()
		}
	}], BootstrapDialog.SIZE_WIDE, "", !1)
}

function add_notification() {
	open_modal("", $("#base_url").val() + "/notificaciones/add_notification", [{
		label: "Guardar",
		cssClass: "btn btn-presta btn-info modal-close",
		action: function (e) {}
	}, {
		label: "Cerrar",
		cssClass: "btn btn-danger modal-close",
		action: function (e) {
			e.close()
		}
	}], BootstrapDialog.SIZE_WIDE, "", !1)
}

function check_notifications() {
	$.ajax({
		type: "post",
		url: $("#base_url").val() + "notificaciones/check_notifications",
		data: {
			csrftoken: 1
		},
		success: function (e) {
			var a = JSON.parse(e);
			if (a.statuss) {
				var t = "<div class='div_check_notifications'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + a.msg + "</div></div>";
				$("div.wraper.container-fluid").prepend(t)
			} else $(".div_check_notifications").html("")
		}
	})
}

function saldar_prestamo(e) {
	BootstrapDialog.confirm({
		title: "CONFIRMAR",
		message: "Seguro que desea saldar este préstamo? Las cuotas restantes se marcaran como cobradas, pero no se registrará ingresos de efectivo.",
		type: BootstrapDialog.TYPE_WARNING,
		callback: function (a) {
			a && $.ajax({
				type: "post",
				url: $("#base_url").val() + "prestamos/saldar",
				data: {
					id: e,
					csrftoken: 1
				},
				success: function (a) {
					get_prestamo_detail(e), manage_response(a)
				}
			})
		}
	})
}

function isPhone() {
	return !!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
}
$("body").on("change", ".liPer", function () {
	var e = $(this).is(":checked"),
		a = $("#selectRoles").val(),
		t = String($(this).attr("id")).replace("li", ""),
		o = $("#base_url").val() + "configuration/role_set_permission";
	$.ajax({
		url: o,
		type: "GET",
		data: {
			add: e,
			permission: t,
			rol: a
		},
		success: function (e) {}
	})
}), $(document).ajaxSuccess(function () {}), $(document).ready(function () {
	$(".treeview-menu").hide(), $(".treeview").click(function (e) {
		$(this).children("ul").toggle("slow")
	}), $("input, textarea").focus(function () {
		return $("html, body").animate({
			scrollTop: $("input, textarea").offset().top - 10
		}, 1), !1
	})
}), $(document).ready(function () {
    var e = window.location.hash.substr(1);
    load_screen($("#base_url").val() + "index.php", "forms/list", "57_tag", !0, "1")
	//"1" == $("#role").val() || "3" == $("#role").val() ? "" !== e ? load_screen($("#base_url").val() + "index.php", e, "48_tag", "", "1", 1, 1) : load_screen($("#base_url").val() + "index.php", "dashboard/main_dashboard", "52_tag", !0, "1") : "" !== e ? load_screen($("#base_url").val() + "index.php", e, "48_tag", "", "1", 1, 1) : load_screen($("#base_url").val() + "index.php", "forms/list", "57_tag", !0, "1")
}), $("a[name=Reports]").click(function () {
	$("ul.list-unstyled").find("li.active ul.nav-second-level").css({
		display: "none"
	}), $("ul.list-unstyled").find("li.active").removeClass("active"), $("a[name=Reports]").parent().addClass("active")
});
var _status = function (e) {
		var a = 0;
		return (e = e.split("__")).length > 1 && (a = parseFloat(e[1]), e = e[0]), "TERMINADO" == e ? '<label class="badge badge-secondary label-custom ">' + e + "</label>" : "VENCIDO" == e ? '<label class="badge badge-danger label-custom blink">' + e + "</label>" : "ATRASO" == e ? '<label class="badge badge-danger label-custom ">' + e + "</label>" : "PENDIENTE" == e ? '<label class="badge badge-dark label-custom ">' + e + "</label>" : "A TIEMPO" == e ? '<label class="badge badge-success label-custom ">' + e + "</label>" : "COBRADA" == e ? '<label class="badge badge-primary label-custom " title="' + (a > 0 ? "" : " Monto cobrado con anterioridad") + '">' + e + (a > 0 ? "" : " A.") + "</label>" : "ABONO" == e ? '<label class="badge badge-primary label-custom " title="ABONO AL CAPITAL">' + e + " C.</label>" : "INCOBRABLE" == e ? '<label class="badge badge-warning label-custom " title="INCOBRABLE">' + e + "</label>" : '<label class="badge badge-primary label-custom " title="">' + e + "</label>"
	},
	_cobrador = function (e) {
		return '<label class="badge badge-dark" style="width: 80%;color: #fff;"><i class="fa fa-motorcycle"></i>&nbsp;' + (e = null == e ? " - " : e) + "</label>"
	};

function miEmpresa() {
	open_modal("", $("#base_url").val() + "configuration/configuration_account", [])
}

function setClientFinder() {
	$(".clientFinder").select2({
		placeholder: "BUSCAR POR CLIENTE|PRESTAMO NO.|CEDULA",
		minimumInputLength: 2,
		allowClear: !0,
		templateResult: formatDesign,
		ajax: {
			url: $("#base_url").val() + "clientes/suggestions",
			dataType: "json",
			quietMillis: 15,
			data: function (e) {
				return {
					term: e,
					limit: 25,
					csrftoken: 1
				}
			},
			results: function (e) {
				return null != e.results ? {
					results: e.results
				} : {
					results: [{
						id: "",
						text: "Ningun resultado"
					}]
				}
			}
		}
	})
}

function formatDesign(e) {
	if (e.loading) return "Buscando en su nube...";
	if (e) {
		var a = e.text.split("__"),
			t = a[3].split("/"),
			o = t[0] == t[1] ? "tr_default" : "results_default";
		return $('<div class="' + o + '"><span><b>Prestamo #:</b>' + a[1] + "<b><br>Cliente: </b>" + a[0] + "</br><b>Monto:</b>" + _money(a[2]) + "<b><br>Cuotas:</b>" + a[3] + "<b><br>Fecha:</b>" + a[4] + ("tr_default" == o ? "<br><b>Estado:</b> Terminado" : "") + "</span></div>")
	}
}

function quicklyResults() {
	$(".ui.search").search({
		apiSettings: {
			url: $("#base_url").val() + "clientes/q_suggestions?q={query}"
		},
		searchOnFocus: !1,
		onSelect: function (e) {
			return console.log(e), console.log(e), get_prestamo_detail(e.id), $(".mobile-toggle-header-nav").eq(0).toggleClass("active"), $(".app-header__content").toggleClass("header-mobile-open"), !0
		},
		noResultsMessage: "Ningun resultado",
		type: "category"
	})
}

function get_client(e, a, t) {
	void 0 === t ? load_screen($("#base_url").val(), "clientes/cliente_detalle/" + e, "", "", "1", "CLIENTE NO(" + e + ")") : open_modal("", $("#base_url").val() + "clientes/cliente_detalle/" + e + "/1", [{
		label: "Cerrar",
		cssClass: "btn btn-danger",
		action: function (e) {
			e.close()
		}
	}], BootstrapDialog.SIZE_WIDE)
}

function ayuda(e) {
	switch (e) {
		case "inicio":
			var a = "https://drive.google.com/file/d/1CmuW7XJ7lQOB2AGYL3s_SDcwnhZ3EVKy/preview";
			break;
		case "cobrar":
			a = "acEOASYioGY";
		default:
			return !1
	}
	var t = '<div class="modal-content">\n\t<div class="modal-header">\n\t\t\n\t\t<span class="text-right" style="position: absolute;right: 55px;">Click al botón de Play</span>\n\t\t<button type="button" class="close" data-dismiss="modal" aria-label="Close">\n\t\t\t<span aria-hidden="true">×</span>\n\t\t</button>\n\t</div>\n  <div class="modal-body text-center">\n  <iframe width="560" height="315" src="' + a + '" frameborder="0" allowfullscreen></iframe>\n  </div>\n\t<div class="modal-footer">\n\t\t<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>\n\t</div>\n</div>';
	$("#myModal .modalContent").html(t), setTimeout(function () {
		$("#myModal").modal({
			show: !0
		})
	}, 1e3)
}

function sTu(e) {
	localStorage.getItem("tutorial_" + e) && "no" != localStorage.getItem("tutorial_" + e) || (ayuda(e), localStorage.setItem("tutorial_" + e, "VISTO"))
}
