function openModal(eventId, title, description, date, time, venue, image) {
    document.getElementById('eventId').value = eventId;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;
    document.getElementById('editDate').value = date;
    document.getElementById('editTime').value = time;
    document.getElementById('editVenue').value = venue;
    document.getElementById('editImage').value = image;

    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
