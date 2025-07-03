// ===== Dark Mode Toggle =====
document.addEventListener('DOMContentLoaded', () => {
  const darkSwitch = document.getElementById('darkSwitch');
  if (darkSwitch) {
    darkSwitch.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode');
    });
  }

  // Example: Save user preference (optional)
  // localStorage.setItem('darkMode', darkSwitch.checked);
});

// ===== Course Search (already inline in courses.html) =====
// Moved inline for better loading control

// ===== Future Enhancements =====
// Add JS interactivity for quizzes, popups, certificates, etc.





