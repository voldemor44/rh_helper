
import { driver } from "driver.js";
import "driver.js/dist/driver.css";

const driverObj = driver();
driverObj.highlight({
  element: '.submenu',
  popover: {
    title: 'Title for the Popover',
    description: 'Description for it',
  },
});

