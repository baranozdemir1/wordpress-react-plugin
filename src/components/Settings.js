import React, { useState } from "react";

export default function Settings() {
  const [firstName, setFirstName] = useState("");
  const [lastName, setLastName] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log("Form submitted");
  };

  return (
    <>
      <form id="work-settings-form">
        <table className="form-table" role="presentation">
          <tbody>
            <tr>
              <th scope="row">
                <label htmlFor="work-settings-form__firstName">
                  First Name
                </label>
              </th>
              <td>
                <input
                  type="text"
                  id="work-settings-form__firstName"
                  name="work-settings-form__firstName"
                  className="regular-text"
                  value={firstName}
                  onChange={(e) => setFirstName(e.target.value)}
                />
              </td>
            </tr>
            <tr>
              <th scope="row">
                <label htmlFor="work-settings-form__lastName">Last Name</label>
              </th>
              <td>
                <input
                  type="text"
                  id="work-settings-form__lastName"
                  name="work-settings-form__lastName"
                  className="regular-text"
                  value={lastName}
                  onChange={(e) => setLastName(e.target.value)}
                />
              </td>
            </tr>
          </tbody>
        </table>
        <p className="submit">
          <button
            type="submit"
            name="submit"
            id="submit"
            className="button button-primary"
            onClick={handleSubmit}
          >
            Save Changes
          </button>
        </p>
      </form>
      <pre>
        {JSON.stringify(
          {
            firstName,
            lastName,
          },
          null,
          2
        )}
      </pre>
    </>
  );
}
