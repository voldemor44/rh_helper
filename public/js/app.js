/*
Author       : Dreamguys
Template Name: SmartHR - Bootstrap Admin Template
Version      : 3.6
*/

$(document).ready(function () {

	// Variables declarations

	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');
	var $slimScrolls = $('.slimscroll');

	// Sidebar

	var Sidemenu = function () {
		this.$menuItem = $('#sidebar-menu a');
	};
	function init() {
		var $this = Sidemenu;
		$('#sidebar-menu a').on('click', function (e) {
			if ($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if (!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(350);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if ($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');


	}

	// Sidebar Initiate
	init();

	// Password toggle
	// Password Show
	if ($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function () {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}


	$("#toggle-password").click(function () {
		$(this).toggleClass("fa-eye fa-eye-slash");
		if ($("#password").attr("type") == "password") {
			$("#password").attr("type", "text");
		} else {
			$("#password").attr("type", "password");
		}
	});

	// Mobile menu sidebar overlay

	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function () {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		$('#task_window').removeClass('opened');
		return false;
	});

	$(".sidebar-overlay").on("click", function () {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$wrapper.removeClass('slide-nav');
		$('.sidebar-overlay').removeClass('opened');
		$('#task_window').removeClass('opened');
	});

	// Chat sidebar overlay

	$(document).on('click', '#task_chat', function () {
		$('.sidebar-overlay').toggleClass('opened');
		$('#task_window').addClass('opened');
		return false;
	});

	// Select 2

	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

	// Modal Popup hide show

	if ($('.modal').length > 0) {
		var modalUniqueClass = ".modal";
		$('.modal').on('show.bs.modal', function (e) {
			var $element = $(this);
			var $uniques = $(modalUniqueClass + ':visible').not($(this));
			if ($uniques.length) {
				$uniques.modal('hide');
				$uniques.one('hidden.bs.modal', function (e) {
					$element.modal('show');
				});
				return false;
			}
		});
	}

	// Floating Label

	if ($('.floating').length > 0) {
		$('.floating').on('focus blur', function (e) {
			$(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
		}).trigger('blur');
	}

	// Date Range Picker
	if ($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}

	// Sidebar Slimscroll

	if ($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function () {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}

	// Page Content Height

	var pHeight = $(window).height();
	$pageWrapper.css('min-height', pHeight);
	$(window).resize(function () {
		var prHeight = $(window).height();
		$pageWrapper.css('min-height', prHeight);
	});

	// Date Time Picker

	if ($('.datetimepicker').length > 0) {
		$('.datetimepicker').datetimepicker({
			//format: 'DD/MM/YYYY',
			format: 'YYYY-MM-DD',
			icons: {
				up: "fa fa-angle-up",
				down: "fa-solid fa-angle-down",
				next: 'fa-solid fa-angle-right',
				previous: 'fa-solid fa-angle-left'
			}
		});
	}

	if ($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: "hh:mm:ss",
			icons: {
				up: "fa fa-angle-up",
				down: "fa-solid fa-angle-down",
				next: 'fa-solid fa-angle-right',
				previous: 'fa-solid fa-angle-left'
			}
		});
	}

	// Datatable

	var table = new DataTable('.datatable', {
		language: {
			url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
		},
	});

	// Tooltip

	if ($('[data-bs-toggle="tooltip"]').length > 0) {
		$('[data-bs-toggle="tooltip"]').tooltip();
	}

	// Email Inbox

	if ($('.clickable-row').length > 0) {
		$(".clickable-row").click(function () {
			window.location = $(this).data("href");
		});
	}

	// Check all email

	$(document).on('click', '#check_all', function () {
		$('.checkmail').click();
		return false;
	});
	if ($('.checkmail').length > 0) {
		$('.checkmail').each(function () {
			$(this).on('click', function () {
				if ($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}

	// Mail important

	$(document).on('click', '.mail-important', function () {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});

	// CK Editor

	if ($('#editor').length > 0) {
		ClassicEditor
			.create(document.querySelector('#editor'), {
				toolbar: {
					items: [
						'heading', '|',
						'fontfamily', 'fontsize', '|',
						'alignment', '|',
						'fontColor', 'fontBackgroundColor', '|',
						'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
						'link', '|',
						'outdent', 'indent', '|',
						'bulletedList', 'numberedList', 'todoList', '|',
						'code', 'codeBlock', '|',
						'insertTable', '|',
						'uploadImage', 'blockQuote', '|',
						'undo', 'redo'
					],
					shouldNotGroupWhenFull: true
				}
			})
			.then(editor => {
				window.editor = editor;
			})
			.catch(err => {
				console.error(err.stack);
			});
	}

	// Task Complete

	$(document).on('click', '#task_complete', function () {
		$(this).toggleClass('task-completed');
		return false;
	});

	// Multiselect

	if ($('#customleave_select').length > 0) {
		$('#customleave_select').multiselect();
	}
	if ($('#edit_customleave_select').length > 0) {
		$('#edit_customleave_select').multiselect();
	}

	// Leave Settings button show

	$(document).on('click', '.leave-edit-btn', function () {
		$(this).removeClass('leave-edit-btn').addClass('btn btn-white leave-cancel-btn').text('Cancel');
		$(this).closest("div.leave-right").append('<button class="btn btn-primary leave-save-btn" type="submit">Save</button>');
		$(this).parent().parent().find("input").prop('disabled', false);
		return false;
	});
	$(document).on('click', '.leave-cancel-btn', function () {
		$(this).removeClass('btn btn-white leave-cancel-btn').addClass('leave-edit-btn').text('Edit');
		$(this).closest("div.leave-right").find(".leave-save-btn").remove();
		$(this).parent().parent().find("input").prop('disabled', true);
		return false;
	});

	$(document).on('change', '.leave-box .onoffswitch-checkbox', function () {
		var id = $(this).attr('id').split('_')[1];
		if ($(this).prop("checked") == true) {
			$("#leave_" + id + " .leave-edit-btn").prop('disabled', false);
			$("#leave_" + id + " .leave-action .btn").prop('disabled', false);
		}
		else {
			$("#leave_" + id + " .leave-action .btn").prop('disabled', true);
			$("#leave_" + id + " .leave-cancel-btn").parent().parent().find("input").prop('disabled', true);
			$("#leave_" + id + " .leave-cancel-btn").closest("div.leave-right").find(".leave-save-btn").remove();
			$("#leave_" + id + " .leave-cancel-btn").removeClass('btn btn-white leave-cancel-btn').addClass('leave-edit-btn').text('Edit');
			$("#leave_" + id + " .leave-edit-btn").prop('disabled', true);
		}
	});

	$('.leave-box .onoffswitch-checkbox').each(function () {
		var id = $(this).attr('id').split('_')[1];
		if ($(this).prop("checked") == true) {
			$("#leave_" + id + " .leave-edit-btn").prop('disabled', false);
			$("#leave_" + id + " .leave-action .btn").prop('disabled', false);
		}
		else {
			$("#leave_" + id + " .leave-action .btn").prop('disabled', true);
			$("#leave_" + id + " .leave-cancel-btn").parent().parent().find("input").prop('disabled', true);
			$("#leave_" + id + " .leave-cancel-btn").closest("div.leave-right").find(".leave-save-btn").remove();
			$("#leave_" + id + " .leave-cancel-btn").removeClass('btn btn-white leave-cancel-btn').addClass('leave-edit-btn').text('Edit');
			$("#leave_" + id + " .leave-edit-btn").prop('disabled', true);
		}
	});

	// Placeholder Hide

	if ($('.otp-input, .zipcode-input input, .noborder-input input').length > 0) {
		$('.otp-input, .zipcode-input input, .noborder-input input').focus(function () {
			$(this).data('placeholder', $(this).attr('placeholder'))
				.attr('placeholder', '');
		}).blur(function () {
			$(this).attr('placeholder', $(this).data('placeholder'));
		});
	}
	// Loader
	setTimeout(function () {
		$('#loader-wrapper');
		setTimeout(function () {
			$("#loader-wrapper").fadeOut("slow");
		}, 100);
	}, 500);


	// OTP Input

	if ($('.otp-input').length > 0) {
		$(".otp-input").keyup(function (e) {
			if ((e.which >= 48 && e.which <= 57) || (e.which >= 96 && e.which <= 105)) {
				$(e.target).next('.otp-input').focus();
			} else if (e.which == 8) {
				$(e.target).prev('.otp-input').focus();
			}
		});
	}

	// Small Sidebar

	$(document).on('click', '#toggle_btn', function () {
		if ($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$('.subdrop + ul').slideDown();
		} else {
			$('body').addClass('mini-sidebar');
			$('.subdrop + ul').slideUp();
		}
		return false;
	});
	$(document).on('mouseover', function (e) {
		e.stopPropagation();
		if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
			var targ = $(e.target).closest('.sidebar').length;
			if (targ) {
				$('body').addClass('expand-menu');
				$('.subdrop + ul').slideDown();
			} else {
				$('body').removeClass('expand-menu');
				$('.subdrop + ul').slideUp();
			}
			return false;
		}
	});

	$(document).on('click', '.top-nav-search .responsive-search', function () {
		$('.top-nav-search').toggleClass('active');
	});

	$(document).on('click', '#file_sidebar_toggle', function () {
		$('.file-wrap').toggleClass('file-sidebar-toggle');
	});
	$(document).on('click', '#file_sidebar_toggle', function () {
		$('.file-wrap').toggleClass('file-sidebar-toggle');
	});
	$(document).on('click', '.list-inline-item .submenu a', function () {
		$('.hidden-links').addClass('hidden');
	});
	$(document).on('click', '.two-col-bar .sub-menu a', function () {
		$('.two-col-bar .sub-menu ul').toggle(500);
	});
	$(document).on('click', '.sidebar-horizantal .viewmoremenu', function () {
		$('.sidebar-horizantal .list-inline-item .submenu ul').hide(500);
		$('.sidebar-horizantal .list-inline-item .submenu a').removeClass("subdrop");
	});
	if ($('.kanban-wrap').length > 0) {
		$(".kanban-wrap").sortable({
			connectWith: ".kanban-wrap",
			handle: ".kanban-box",
			placeholder: "drag-placeholder"
		});
	}



	if ($(window).width() < 991) {
		$("html").each(function () {
			var attributes = $.map(this.attributes, function (item) {
				return item.name;
			});

			var img = $(this);
			$.each(attributes, function (i, item) {
				img.removeAttr(item);
			});
		});
	}

	// $(document).on('click', '#customizer-layout02', function() {
	// 	location.reload();
	// });

	$(document).ready(function () {
		$("#sidebar-size-compact").click(function () {
			$('html').attr("data-layout", "vertical");
		});
	});
	$(document).ready(function () {
		$("#sidebar-size-small-hover").click(function () {
			$('html').attr("data-layout", "vertical");
		});
	});
	$(document).ready(function () {
		$("[data-layout=horizontal] #sidebar-size-compact").click(function () {
			$('html').attr("data-layout", "vertical");
		});
	});
	$(document).ready(function () {
		$("[data-layout=horizontal] #sidebar-size-small-hover").click(function () {
			$('html').attr("data-layout", "vertical");
		});
	});
	$(document).ready(function () {
		$(".colorscheme-cardradio input[type=radio]").click(function () {
			$("html").removeAttr("data-topbar");
		});

		$(".viewmoremenu").click(function () {
			$(".hidden-links").toggleClass("hidden");
		});

	});


	$("[data-sidebar-size=sm-hover] #customizer-layout03").click(function () {
		$("html").removeAttr("data-layout-mode");
	});
	$(".greedy .list-inline-item .submenu a").click(function () {
		$(".hidden-links").addClass("hidden");
	});

});


var isPushEnabled = false;

window.addEventListener('load', function() {
    var pushButton = document.querySelector('.js-push-button');
    if (pushButton) {
        pushButton.addEventListener('click', function() {
            if (isPushEnabled) {
                push_unsubscribe();
            } else {
                push_subscribe();
            }
        });
    }

    // double notification badge only on mobile layout
    var navbarToggle = $('.navbar-toggle:visible');
    if(navbarToggle) {
        var notificationCounters = document.getElementsByClassName('notificationCounter');

        if (notificationCounters.length) {
            var notificationCounterWrapperNavbar = document.querySelector('.navbar-toggle .notificationCounterWrapper');

            var notificationCounter = document.createElement('span');
            notificationCounter.className = 'notificationCounter badge badge-notification';
            notificationCounter.textContent = notificationCounters[0].textContent;
            notificationCounterWrapperNavbar.appendChild(notificationCounter);
        }
    }

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register(window.swPath)
        .then(function(sw) {
            console.log('[SW] Service worker enregistré');
            push_initialiseState();
            initPostMessageListener();
        }, function (e) {
            console.error('[SW] Oups...', e);
            changePushButtonState('incompatible');

        });
    } else {
        console.warn('[SW] Les service workers ne sont pas encore supportés par ce navigateur.');
        changePushButtonState('incompatible');
    }
});

function changePushButtonState(state) {
    var $pushButtons = $('.js-push-button');

    for (var i = 0; i < $pushButtons.length; i++) {
        var pushButton = $pushButtons[i];
        var $pushButton = $(pushButton);

        switch (state) {
            case 'enabled':
                pushButton.disabled = false;
                pushButton.title = "Notifications Push activées";
                $pushButton.addClass("active");
                isPushEnabled = true;
                break;
            case 'disabled':
                pushButton.disabled = false;
                pushButton.title = "Notifications Push désactivées";
                $pushButton.removeClass("active");
                isPushEnabled = false;
                break;
            case 'computing':
                pushButton.disabled = true;
                pushButton.title = "Chargement...";
                break;
            case 'incompatible':
                pushButton.disabled = true;
                pushButton.title = "Notifications Push non disponibles (navigateur non compatible)";
                break;
            default:
                console.error('Unhandled push button state', state);
                break;
        }
    }
}

function initPostMessageListener() {
    var onRefreshNotifications = function () {
        var notificationCounters = document.getElementsByClassName('notificationCounter');

        if (!notificationCounters.length) {
            var notificationCounterWrappers = document.getElementsByClassName('notificationCounterWrapper');

            for (var i = 0; i < notificationCounterWrappers.length; i++) {
                var notificationCounter = document.createElement('span');
                notificationCounter.className = 'notificationCounter badge badge-notification';
                notificationCounter.textContent = '0';
                notificationCounterWrappers[i].appendChild(notificationCounter);
            }
        }

        for (var i = 0; i < notificationCounters.length; i++) {
            notificationCounters[i].textContent++;
        }
    };

    var onRemoveNotifications = function() {
        $('.notificationCounter').remove();
    };

    navigator.serviceWorker.addEventListener('message', function(e) {
        var message = e.data;

        switch (message) {
            case 'reload':
                window.location.reload(true);
                break;
            case 'refreshNotifications':
                onRefreshNotifications();
                break;
            case 'removeNotifications':
                onRemoveNotifications();
                break;
            default:
                console.warn("Message '" + message + "' not handled.");
                break;
        }
    });
}

function push_initialiseState() {
    // Are Notifications supported in the service worker?
    if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
        console.warn('[SW] Les notifications ne sont pas supportées par ce navigateur.');
        changePushButtonState('incompatible');
        return;
    }

    // Check the current Notification permission.
    // If its denied, it's a permanent block until the
    // user changes the permission
    if (Notification.permission === 'denied') {
        console.warn('[SW] Les notifications ne sont pas autorisées par l\'utilisateur.');
        changePushButtonState('disabled');
        return;
    }

    // Check if push messaging is supported
    if (!('PushManager' in window)) {
        console.warn('[SW] Les messages Push ne sont pas supportés par ce navigateur.');
        changePushButtonState('incompatible');
        return;
    }

    // We need the service worker registration to check for a subscription
    navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
        // Do we already have a push message subscription?
        serviceWorkerRegistration.pushManager.getSubscription()
        .then(function(subscription) {
            // Enable any UI which subscribes / unsubscribes from
            // push messages.
            changePushButtonState('disabled');

            if (!subscription) {
                // We aren't subscribed to push, so set UI
                // to allow the user to enable push
                return;
            }

            // Keep your server in sync with the latest endpoint
            push_sendSubscriptionToServer(subscription, 'update');

            // Set your UI to show they have subscribed for push messages
            changePushButtonState('enabled');
        })
        ['catch'](function(err) {
            console.warn('[SW] Erreur pendant getSubscription()', err);
        });
    });
}

function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

function push_subscribe() {
    // Disable the button so it can't be changed while
    // we process the permission request
    changePushButtonState('computing');

    navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
        serviceWorkerRegistration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(vapidPublicKey)
        })
        .then(function(subscription) {
            // The subscription was successful
            changePushButtonState('enabled');

            // on a la subscription, il faut l'enregistrer en BDD
            return push_sendSubscriptionToServer(subscription, 'create');
        })
        ['catch'](function(e) {
            if (Notification.permission === 'denied') {
                // The user denied the notification permission which
                // means we failed to subscribe and the user will need
                // to manually change the notification permission to
                // subscribe to push messages
                console.warn('[SW] Les notifications ne sont pas autorisées par l\'utilisateur.');
                changePushButtonState('incompatible');
            } else {
                // A problem occurred with the subscription; common reasons
                // include network errors, and lacking gcm_sender_id and/or
                // gcm_user_visible_only in the manifest.
                console.error('[SW] Impossible de souscrire aux notifications.', e);
                changePushButtonState('disabled');
            }
        });
    });
}

function push_unsubscribe() {
  changePushButtonState('computing');

  navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
    // To unsubscribe from push messaging, you need get the
    // subscription object, which you can call unsubscribe() on.
    serviceWorkerRegistration.pushManager.getSubscription().then(
      function(pushSubscription) {
        // Check we have a subscription to unsubscribe
        if (!pushSubscription) {
            // No subscription object, so set the state
            // to allow the user to subscribe to push
            changePushButtonState('disabled');
          return;
        }

        push_sendSubscriptionToServer(pushSubscription, 'delete');

        // We have a subscription, so call unsubscribe on it
        pushSubscription.unsubscribe().then(function(successful) {
            changePushButtonState('disabled');
        })['catch'](function(e) {
            // We failed to unsubscribe, this can lead to
            // an unusual state, so may be best to remove
            // the users data from your data store and
            // inform the user that you have done so

            console.log('[SW] Erreur pendant le désabonnement aux notifications: ', e);
            changePushButtonState('disabled');
        });
      })['catch'](function(e) {
        console.error('[SW] Erreur pendant le désabonnement aux notifications.', e);
      });
  });
}

function push_sendSubscriptionToServer(subscription, action) {
    var req = new XMLHttpRequest();
    var url = Routing.generate('pjm_app_api_pushsubscription_' + action);
    req.open('POST', url, true);
    req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    req.setRequestHeader("Content-type", "application/json");
    req.onreadystatechange = function (e) {
        if (req.readyState == 4) {
            if(req.status != 200) {
                console.error("[SW] Erreur :" + e.target.status);
            }
        }
    };
    req.onerror = function (e) {
        console.error("[SW] Erreur :" + e.target.status);
    };

    var key = subscription.getKey('p256dh');
    var token = subscription.getKey('auth');

    req.send(JSON.stringify({
        'endpoint': getEndpoint(subscription),
        'key': key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
        'token': token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null
    }));

    return true;
}

function getEndpoint(pushSubscription) {
    var endpoint = pushSubscription.endpoint;
    var subscriptionId = pushSubscription.subscriptionId;

    // fix Chrome < 45
    if (subscriptionId && endpoint.indexOf(subscriptionId) === -1) {
        endpoint += '/' + subscriptionId;
    }

    return endpoint;
}
